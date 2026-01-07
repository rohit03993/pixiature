<?php

namespace App\Http\Controllers;

use App\Models\EnrollmentApplication;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard()
    {
        $totalApplications = EnrollmentApplication::count();
        $pendingApplications = EnrollmentApplication::where('status', 'submitted')->count();
        $acceptedApplications = EnrollmentApplication::where('status', 'accepted')->count();
        $recentApplications = EnrollmentApplication::orderBy('created_at', 'desc')->take(10)->get();
        
        return view('admin.dashboard', compact('totalApplications', 'pendingApplications', 'acceptedApplications', 'recentApplications'));
    }

    public function index()
    {
        $applications = EnrollmentApplication::orderBy('created_at', 'desc')->paginate(20);
        
        return view('admin.applications', compact('applications'));
    }

    public function show($id)
    {
        $application = EnrollmentApplication::findOrFail($id);
        
        return view('admin.show', compact('application'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:draft,submitted,reviewed,accepted,rejected'
        ]);

        $application = EnrollmentApplication::findOrFail($id);
        $application->status = $request->status;
        $application->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

    public function delete($id)
    {
        $application = EnrollmentApplication::findOrFail($id);
        $application->delete();

        return redirect()->route('admin.applications')->with('success', 'Application deleted successfully!');
    }
}
