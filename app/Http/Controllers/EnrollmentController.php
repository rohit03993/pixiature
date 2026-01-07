<?php

namespace App\Http\Controllers;

use App\Models\EnrollmentApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnrollmentController extends Controller
{
    public function showForm()
    {
        return view('enrollment.form');
    }

    public function submitStep(Request $request, $step)
    {
        $data = $request->except(['_token']);
        
        // Merge arrays properly (for checkboxes)
        $sessionData = session('enrollment_data', []);
        foreach ($data as $key => $value) {
            // Remove [] suffix from checkbox names for consistency
            $cleanKey = rtrim($key, '[]');
            
            if (is_array($value) && !empty($value)) {
                // For arrays (checkboxes), merge with existing or set new
                if (isset($sessionData[$cleanKey]) && is_array($sessionData[$cleanKey])) {
                    // Merge arrays and remove duplicates
                    $merged = array_merge($sessionData[$cleanKey], $value);
                    // Filter out any nested arrays and get unique values
                    $flat = [];
                    foreach ($merged as $item) {
                        if (is_scalar($item)) {
                            $flat[] = $item;
                        }
                    }
                    $sessionData[$cleanKey] = array_values(array_unique($flat));
                } else {
                    // Filter to only scalar values
                    $flat = array_filter($value, 'is_scalar');
                    $sessionData[$cleanKey] = array_values(array_unique($flat));
                }
            } else {
                // For non-array values, just replace
                $sessionData[$cleanKey] = $value;
            }
        }
        
        session(['enrollment_data' => $sessionData]);
        
        if ($step < 6) {
            return response()->json([
                'success' => true,
                'message' => 'Step ' . $step . ' saved',
                'next_step' => $step + 1
            ]);
        }
        
        // Final step - save to database
        return $this->saveApplication($request);
    }

    public function saveApplication(Request $request)
    {
        $sessionData = session('enrollment_data', []);
        $requestData = $request->except(['_token']);
        
        // Clean request data keys (remove [] suffix)
        $cleanedRequestData = [];
        foreach ($requestData as $key => $value) {
            $cleanKey = rtrim($key, '[]');
            $cleanedRequestData[$cleanKey] = $value;
        }
        
        // Merge arrays properly - request data takes priority
        $allData = array_merge($sessionData, $cleanedRequestData);
        
        // Handle array fields properly (checkboxes come as arrays)
        foreach ($allData as $key => $value) {
            if (is_array($value) && !empty($value)) {
                // Filter to only scalar values and remove duplicates
                $flat = array_filter($value, 'is_scalar');
                if (!empty($flat)) {
                    $allData[$key] = array_values(array_unique($flat));
                } else {
                    unset($allData[$key]);
                }
            }
        }
        
        $validator = Validator::make($allData, [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'age' => 'nullable|integer|min:1|max:120',
            'city_country' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Convert arrays to JSON for storage
        if (isset($allData['design_tools']) && is_array($allData['design_tools'])) {
            $allData['design_tools'] = json_encode($allData['design_tools']);
        }
        if (isset($allData['why_learn_design']) && is_array($allData['why_learn_design'])) {
            $allData['why_learn_design'] = json_encode($allData['why_learn_design']);
        }
        if (isset($allData['want_to_learn']) && is_array($allData['want_to_learn'])) {
            $allData['want_to_learn'] = json_encode($allData['want_to_learn']);
        }

        $allData['status'] = 'submitted';

        try {
            $application = EnrollmentApplication::create($allData);
            
            // Clear session
            session()->forget('enrollment_data');

            return response()->json([
                'success' => true,
                'message' => 'Application submitted successfully!',
                'application_id' => $application->id
            ]);
        } catch (\Exception $e) {
            \Log::error('Enrollment submission error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            \Log::error('Data attempted: ' . json_encode($allData));
            
            $errorMessage = 'There was an error submitting your application. Please try again.';
            if (config('app.debug')) {
                $errorMessage .= '\n\nError: ' . $e->getMessage();
            }
            
            return response()->json([
                'success' => false,
                'message' => $errorMessage,
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
}
