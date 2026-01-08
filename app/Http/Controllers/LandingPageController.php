<?php

namespace App\Http\Controllers;

use App\Models\LandingPageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $sections = LandingPageSection::orderBy('display_order')->get();
        return view('admin.landing-page.index', compact('sections'));
    }

    public function edit($id)
    {
        $section = LandingPageSection::findOrFail($id);
        return view('admin.landing-page.edit', compact('section'));
    }

    public function update(Request $request, $id)
    {
        $section = LandingPageSection::findOrFail($id);
        
        $request->validate([
            'section_name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'is_active' => 'boolean',
        ]);

        $data = $request->only(['section_name', 'content', 'is_active']);

        // Build text_fields array from individual form fields
        $textFields = [];
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'text_') === 0 && $key !== 'text_fields') {
                $fieldName = str_replace('text_', '', $key);
                if ($value !== null && $value !== '') {
                    // Preserve the value as-is (including \n for line breaks)
                    $textFields[$fieldName] = $value;
                }
            }
        }
        // Always update text_fields, even if empty (to clear fields)
        $data['text_fields'] = $textFields;

        // Build settings array from individual form fields
        $settings = [];
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'setting_') === 0 && $key !== 'settings') {
                $fieldName = str_replace('setting_', '', $key);
                if ($value !== null && $value !== '') {
                    // Handle boolean values
                    if ($value === '1' || $value === 'true' || $value === 'on') {
                        $settings[$fieldName] = true;
                    } elseif ($value === '0' || $value === 'false' || $value === 'off') {
                        $settings[$fieldName] = false;
                    } else {
                        $settings[$fieldName] = $value;
                    }
                }
            }
        }
        if (!empty($settings)) {
            $data['settings'] = $settings;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($section->image_path && Storage::disk('public')->exists($section->image_path)) {
                Storage::disk('public')->delete($section->image_path);
            }

            // Store new image
            $imagePath = $request->file('image')->store('landing-page', 'public');
            $data['image_path'] = $imagePath;
        }

        $section->update($data);

        return redirect()->route('admin.landing-page.index')
            ->with('success', 'Section updated successfully!');
    }

    public function create()
    {
        return view('admin.landing-page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'section_key' => 'required|string|max:255|unique:landing_page_sections,section_key',
            'section_name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'text_fields' => 'nullable|array',
            'settings' => 'nullable|array',
            'display_order' => 'nullable|integer',
        ]);

        $data = $request->only(['section_key', 'section_name', 'content', 'text_fields', 'settings', 'display_order']);
        $data['is_active'] = $request->has('is_active');

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('landing-page', 'public');
            $data['image_path'] = $imagePath;
        }

        LandingPageSection::create($data);

        return redirect()->route('admin.landing-page.index')
            ->with('success', 'Section created successfully!');
    }
}

