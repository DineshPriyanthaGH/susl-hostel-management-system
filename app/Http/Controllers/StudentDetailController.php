<?php

namespace App\Http\Controllers;

use App\Models\StudentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentDetailController extends Controller
{
    public function create()
    {
        // Check if admin is logged in
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }
        
        return view('student_details.create');
    }

    public function store(Request $request)
    {
        // Check if admin is logged in
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }

        try {
            $validated = $request->validate([
                'title' => 'required|in:Mr.,Mrs.,Rev.',
                'full_name' => 'required|string|max:255',
                'student_id' => 'required|string|unique:student_details,student_id',
                'faculty' => 'required|string|max:255',
                'telephone_number' => 'required|string|size:10',
                'first_year_hostel' => 'nullable|string|max:255',
                'first_year_payment_date' => 'nullable|date',
                'second_year_hostel' => 'nullable|string|max:255',
                'second_year_payment_date' => 'nullable|date',
                'third_year_hostel' => 'nullable|string|max:255',
                'third_year_payment_date' => 'nullable|date',
                'fourth_year_hostel' => 'nullable|string|max:255',
                'fourth_year_payment_date' => 'nullable|date',
                'guardian_name' => 'required|string|max:255',
                'guardian_telephone' => 'required|string|size:10',
                'residential_address' => 'required|string'
            ]);

            // Format payment dates
            $paymentDateFields = [
                'first_year_payment_date',
                'second_year_payment_date',
                'third_year_payment_date',
                'fourth_year_payment_date'
            ];

            foreach ($paymentDateFields as $field) {
                if (!empty($validated[$field])) {
                    $validated[$field] = date('Y-m-d', strtotime($validated[$field]));
                }
            }

            // Create the student record
            $student = StudentDetail::create($validated);

            // Store student data in session for verification page
            Session::put('student_data', [
                'title' => $validated['title'],
                'full_name' => $validated['full_name'],
                'student_id' => $validated['student_id'],
                'faculty' => $validated['faculty'],
                'telephone_number' => $validated['telephone_number'],
                'first_year_hostel' => $validated['first_year_hostel'] ?? 'Not specified',
                'second_year_hostel' => $validated['second_year_hostel'] ?? 'Not specified',
                'third_year_hostel' => $validated['third_year_hostel'] ?? 'Not specified',
                'fourth_year_hostel' => $validated['fourth_year_hostel'] ?? 'Not specified',
                'guardian_name' => $validated['guardian_name'],
                'guardian_telephone' => $validated['guardian_telephone'],
                'residential_address' => $validated['residential_address'],
                'submission_time' => now()->format('Y-m-d H:i:s'),
                'id' => $student->id
            ]);

            // Redirect to verification page
            return redirect()->route('student.details.verified')
                ->with('success', 'Student details added successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function verified()
    {
        // Check if admin is logged in
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }

        // Check if there's student data in session
        if (!Session::has('student_data')) {
            return redirect()->route('admin.dashboard')
                ->with('info', 'No recent student submission found.');
        }

        return view('details_verified');
    }

    public function clearSession()
    {
        // Clear the student data from session
        Session::forget('student_data');
        
        return response()->json(['status' => 'success']);
    }

    public function search()
    {
        // Check if admin is logged in
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }
        
        return view('student_search');
    }

    public function findStudent(Request $request)
    {
        // Check if admin is logged in
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }

        $request->validate([
            'student_id' => 'required|string'
        ]);

        $student = StudentDetail::where('student_id', $request->student_id)->first();

        if (!$student) {
            return redirect()->back()
                ->with('error', 'Student not found with ID: ' . $request->student_id)
                ->withInput();
        }

        return view('student_details_view', compact('student'));
    }

    public function index()
    {
        // Check if admin is logged in
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }

        $students = StudentDetail::orderBy('created_at', 'desc')->paginate(10);
        return view('student_details.index', compact('students'));
    }

    public function getData()
    {
        // Check if admin is logged in
        if (!Session::get('admin_logged_in')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        try {
            $students = StudentDetail::orderBy('created_at', 'desc')->get();
            
            // Format the data for the frontend
            $formattedStudents = $students->map(function ($student) {
                // Parse the full name
                $nameParts = explode(' ', $student->full_name, 2);
                $firstName = $nameParts[0] ?? '';
                $lastName = $nameParts[1] ?? '';
                
                // Determine current hostel (most recent year with hostel assignment)
                $currentHostel = null;
                if ($student->fourth_year_hostel) $currentHostel = $student->fourth_year_hostel;
                elseif ($student->third_year_hostel) $currentHostel = $student->third_year_hostel;
                elseif ($student->second_year_hostel) $currentHostel = $student->second_year_hostel;
                elseif ($student->first_year_hostel) $currentHostel = $student->first_year_hostel;
                
                return [
                    'id' => $student->id,
                    'student_id' => $student->student_id,
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'email' => $student->student_id . '@students.susl.ac.lk', // Generate email from student ID
                    'phone' => $student->telephone_number,
                    'faculty' => $student->faculty,
                    'year' => 'N/A', // You may want to calculate this based on current date and admission year
                    'current_hostel' => $currentHostel
                ];
            });

            return response()->json($formattedStudents);
            
        } catch (\Exception $e) {
            \Log::error('Error getting student data: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to load student data'], 500);
        }
    }

    public function show($id)
    {
        // Check if admin is logged in
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }

        $student = StudentDetail::findOrFail($id);
        return view('student_details.show', compact('student'));
    }

    public function edit($id)
    {
        // Check if admin is logged in
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }

        $student = StudentDetail::findOrFail($id);
        return view('student_details.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        // Check if admin is logged in
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }

        $student = StudentDetail::findOrFail($id);

        try {
            $validated = $request->validate([
                'title' => 'required|in:Mr.,Mrs.,Rev.',
                'full_name' => 'required|string|max:255',
                'student_id' => 'required|string|unique:student_details,student_id,' . $id,
                'faculty' => 'required|string|max:255',
                'telephone_number' => 'required|string|size:10',
                'first_year_hostel' => 'nullable|string|max:255',
                'first_year_payment_date' => 'nullable|date',
                'second_year_hostel' => 'nullable|string|max:255',
                'second_year_payment_date' => 'nullable|date',
                'third_year_hostel' => 'nullable|string|max:255',
                'third_year_payment_date' => 'nullable|date',
                'fourth_year_hostel' => 'nullable|string|max:255',
                'fourth_year_payment_date' => 'nullable|date',
                'guardian_name' => 'required|string|max:255',
                'guardian_telephone' => 'required|string|size:10',
                'residential_address' => 'required|string'
            ]);

            // Format payment dates
            $paymentDateFields = [
                'first_year_payment_date',
                'second_year_payment_date',
                'third_year_payment_date',
                'fourth_year_payment_date'
            ];

            foreach ($paymentDateFields as $field) {
                if (!empty($validated[$field])) {
                    $validated[$field] = date('Y-m-d', strtotime($validated[$field]));
                }
            }

            $student->update($validated);

            return redirect()->route('student.details.show', $student->id)
                ->with('success', 'Student details updated successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        // Check if admin is logged in
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }

        $student = StudentDetail::findOrFail($id);
        $student->delete();

        return redirect()->route('student.details.index')
            ->with('success', 'Student details deleted successfully!');
    }

    public function exportPDF(Request $request)
    {
        try {
            // Check if admin is logged in - more lenient check
            $adminLoggedIn = Session::get('admin_logged_in');
            $adminUserId = Session::get('admin_user_id');
            
            if (!$adminLoggedIn && !$adminUserId) {
                // Return JSON for AJAX requests, redirect for direct access
                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json([
                        'error' => 'Authentication required',
                        'redirect' => route('admin.login')
                    ], 401);
                }
                return redirect()->route('admin.login')->with('error', 'Please login first.');
            }

            $hostel = $request->get('hostel');
            $year = $request->get('year', 'all');
            
            // Debug logging
            \Log::info('PDF Export Request', [
                'hostel' => $hostel,
                'year' => $year,
                'admin_logged_in' => $adminLoggedIn,
                'admin_user_id' => $adminUserId,
                'request_method' => $request->method(),
                'user_agent' => $request->userAgent()
            ]);
            
            // Build query based on filters
            $query = StudentDetail::query();
            
            if ($hostel && $hostel !== 'all') {
                if ($year && $year !== 'all') {
                    // Filter by specific year hostel
                    $hostelField = $year . '_year_hostel';
                    $query->where($hostelField, $hostel);
                } else {
                    // Filter by any year hostel
                    $query->where(function($q) use ($hostel) {
                        $q->where('first_year_hostel', $hostel)
                          ->orWhere('second_year_hostel', $hostel)
                          ->orWhere('third_year_hostel', $hostel)
                          ->orWhere('fourth_year_hostel', $hostel);
                    });
                }
            }
            
            $students = $query->orderBy('full_name')->get();
            
            // For debugging - create simple HTML if DomPDF fails
            try {
                // Prepare data for PDF
                $data = [
                    'students' => $students,
                    'hostel' => $hostel,
                    'year' => $year,
                    'total_students' => $students->count(),
                    'generated_at' => now()->format('Y-m-d H:i:s'),
                    'generated_by' => $adminUserId ?: 'Admin'
                ];
                
                // Generate PDF
                $pdf = PDF::loadView('reports.students_hostel_pdf', $data);
                $pdf->setPaper('A4', 'portrait');
                
                // Generate filename
                $filename = 'SUSL_Students_';
                if ($hostel && $hostel !== 'all') {
                    $filename .= str_replace(' ', '_', $hostel) . '_';
                }
                if ($year && $year !== 'all') {
                    $filename .= ucfirst($year) . '_Year_';
                }
                $filename .= date('Y-m-d_H-i-s') . '.pdf';
                
                return $pdf->download($filename);
                
            } catch (\Exception $pdfError) {
                \Log::error('PDF Generation Error', [
                    'error' => $pdfError->getMessage(),
                    'file' => $pdfError->getFile(),
                    'line' => $pdfError->getLine()
                ]);
                
                // Return JSON response with debug info
                return response()->json([
                    'error' => 'PDF generation failed',
                    'message' => $pdfError->getMessage(),
                    'students_count' => $students->count(),
                    'hostel' => $hostel,
                    'year' => $year,
                    'debug' => 'Check logs for detailed error information'
                ], 500);
            }
            
        } catch (\Exception $e) {
            \Log::error('Export PDF Error', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            
            return response()->json([
                'error' => 'Export failed',
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => basename($e->getFile())
            ], 500);
        }
    }

    public function getHostelOptions()
    {
        // For debugging - temporarily remove session check
        // if (!Session::get('admin_logged_in')) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }

        try {
            // Get all unique hostels from all year columns
            $hostels = collect();
            
            $fields = ['first_year_hostel', 'second_year_hostel', 'third_year_hostel', 'fourth_year_hostel'];
            
            foreach ($fields as $field) {
                $fieldHostels = StudentDetail::whereNotNull($field)
                    ->where($field, '!=', '')
                    ->where($field, '!=', 'Off Campus')
                    ->distinct()
                    ->pluck($field);
                $hostels = $hostels->merge($fieldHostels);
            }
            
            $uniqueHostels = $hostels->unique()->sort()->values();
            
            return response()->json($uniqueHostels);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}