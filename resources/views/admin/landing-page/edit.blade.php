<!doctype html>
<html lang="en">
<head>
    <title>Edit Section - Pixature Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/css/admin.css'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic">
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <div class="header-content">
                <h1>✏️ Edit Section: {{ $section->section_name }}</h1>
                <div class="header-actions">
                    <a href="{{ route('admin.landing-page.index') }}" class="btn btn-secondary">← Back to Sections</a>
                    <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>
                </div>
            </div>
        </header>

        <div class="admin-content">
            <div class="admin-tabs">
                <a href="{{ route('admin.dashboard') }}" class="tab">Dashboard</a>
                <a href="{{ route('admin.applications') }}" class="tab">Applications</a>
                <a href="{{ route('admin.landing-page.index') }}" class="tab active">Landing Page</a>
            </div>

            @if($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.landing-page.update', $section->id) }}" enctype="multipart/form-data" class="section-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="section_name">Section Name *</label>
                    <input type="text" id="section_name" name="section_name" value="{{ old('section_name', $section->section_name) }}" required>
                </div>

                <div class="form-group">
                    <label for="section_key">Section Key (Read-only)</label>
                    <input type="text" value="{{ $section->section_key }}" disabled>
                    <small>This is the unique identifier for this section</small>
                </div>

                <div class="form-group">
                    <label for="image">Section Image</label>
                    @if($section->image_path)
                        <div class="current-image">
                            <img src="{{ Storage::url($section->image_path) }}" alt="Current image" style="max-width: 300px; border-radius: 8px; margin-bottom: 10px;">
                            <p><small>Current image</small></p>
                        </div>
                    @endif
                    <input type="file" id="image" name="image" accept="image/*">
                    <small>Upload a new image to replace the current one (Max: 5MB)</small>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" rows="6">{{ old('content', $section->content) }}</textarea>
                    <small>Main content text for this section</small>
                </div>

                @php
                    $textFields = is_array($section->text_fields) ? $section->text_fields : (is_string($section->text_fields) ? json_decode($section->text_fields, true) : []);
                    $settings = is_array($section->settings) ? $section->settings : (is_string($section->settings) ? json_decode($section->settings, true) : []);
                @endphp

                @if($section->section_key === 'hero')
                    <div class="form-section">
                        <h3>Hero Section Text Fields</h3>
                        <p class="section-description">Edit the hero section text elements</p>
                        
                        <div class="text-fields-grid">
                            <div class="form-group">
                                <label for="text_tagline_left">Tagline Left</label>
                                <input type="text" id="text_tagline_left" name="text_tagline_left" value="{{ old('text_tagline_left', $textFields['tagline_left'] ?? 'Create Like a Pro') }}" placeholder="Left side tagline">
                                <small>Text that appears on the left side of hero section</small>
                            </div>

                            <div class="form-group">
                                <label for="text_tagline_right">Tagline Right</label>
                                <input type="text" id="text_tagline_right" name="text_tagline_right" value="{{ old('text_tagline_right', $textFields['tagline_right'] ?? 'Design Your Way Forward') }}" placeholder="Right side tagline">
                                <small>Text that appears on the right side of hero section</small>
                            </div>

                            <div class="form-group full-width">
                                <label for="text_main_headline">Main Headline</label>
                                <textarea id="text_main_headline" name="text_main_headline" rows="3" placeholder="Learn.\nDesign.\nGrow.">{{ old('text_main_headline', $textFields['main_headline'] ?? 'Learn.\nDesign.\nGrow.') }}</textarea>
                                <small>Main headline text. Use \n for line breaks (e.g., Learn.\nDesign.\nGrow.)</small>
                            </div>
                        </div>
                    </div>
                @elseif($section->section_key === 'cta_bar')
                    <div class="form-section">
                        <h3>CTA Bar Text</h3>
                        <p class="section-description">Edit the call-to-action bar text</p>
                        
                        <div class="form-group">
                            <label for="text_cta_text">CTA Text</label>
                            <input type="text" id="text_cta_text" name="text_cta_text" value="{{ old('text_cta_text', $textFields['cta_text'] ?? 'Get Yourself Enrolled for the next batch') }}" placeholder="Get Yourself Enrolled for the next batch">
                            <small>Text displayed in the enrollment bar</small>
                        </div>
                    </div>
                @elseif($section->section_key === 'before_after')
                    <div class="form-section">
                        <h3>Before/After Section Text</h3>
                        <p class="section-description">Edit the heading for the before/after section</p>
                        
                        <div class="form-group">
                            <label for="text_heading">Heading</label>
                            <input type="text" id="text_heading" name="text_heading" value="{{ old('text_heading', $textFields['heading'] ?? 'Only 1 month of Sprint get you there') }}" placeholder="Only 1 month of Sprint get you there">
                            <small>Heading text above the before/after slider</small>
                        </div>
                    </div>
                @elseif($section->section_key === 'design_sprint')
                    <div class="form-section">
                        <h3>Mastering Section Text</h3>
                        <p class="section-description">Edit the text for the mastering section</p>
                        
                        <div class="form-group">
                            <label for="text_description">Description</label>
                            <textarea id="text_description" name="text_description" rows="3" placeholder="Mastering\nThe Hidden\nCreative Power">{{ old('text_description', $textFields['description'] ?? 'Mastering\nThe Hidden\nCreative Power') }}</textarea>
                            <small>Main text for the mastering section. Use \n for line breaks</small>
                        </div>
                    </div>
                @else
                    <div class="form-section">
                        <h3>Text Fields</h3>
                        <p class="section-description">Edit text elements for this section</p>
                        
                        <div class="form-group">
                            <label for="text_heading">Heading</label>
                            <input type="text" id="text_heading" name="text_heading" value="{{ old('text_heading', $textFields['heading'] ?? '') }}" placeholder="Main heading">
                        </div>

                        <div class="form-group">
                            <label for="text_description">Description</label>
                            <textarea id="text_description" name="text_description" rows="4" placeholder="Section description">{{ old('text_description', $textFields['description'] ?? '') }}</textarea>
                        </div>
                    </div>
                @endif

                <div class="form-section">
                    <h3>Settings</h3>
                    <p class="section-description">Configure section behavior and appearance</p>
                    
                    <div class="settings-grid">
                        <div class="form-group">
                            <label for="setting_animation">Animation Type</label>
                            <select id="setting_animation" name="setting_animation">
                                <option value="">None</option>
                                <option value="fade-in" {{ old('setting_animation', $settings['animation'] ?? '') === 'fade-in' ? 'selected' : '' }}>Fade In</option>
                                <option value="slide-up" {{ old('setting_animation', $settings['animation'] ?? '') === 'slide-up' ? 'selected' : '' }}>Slide Up</option>
                                <option value="slide-left" {{ old('setting_animation', $settings['animation'] ?? '') === 'slide-left' ? 'selected' : '' }}>Slide Left</option>
                                <option value="slide-right" {{ old('setting_animation', $settings['animation'] ?? '') === 'slide-right' ? 'selected' : '' }}>Slide Right</option>
                                <option value="scale-in" {{ old('setting_animation', $settings['animation'] ?? '') === 'scale-in' ? 'selected' : '' }}>Scale In</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="setting_color">Primary Color</label>
                            <input type="color" id="setting_color" name="setting_color" value="{{ old('setting_color', $settings['color'] ?? '#f3704d') }}">
                        </div>

                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="setting_typing_animation" value="1" {{ old('setting_typing_animation', $settings['typing_animation'] ?? false) ? 'checked' : '' }}>
                                <span>Enable Typing Animation</span>
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="setting_parallax" value="1" {{ old('setting_parallax', $settings['parallax'] ?? false) ? 'checked' : '' }}>
                                <span>Enable Parallax Effect</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $section->is_active) ? 'checked' : '' }}>
                        <span>Active (Show on landing page)</span>
                    </label>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update Section</button>
                    <a href="{{ route('admin.landing-page.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

