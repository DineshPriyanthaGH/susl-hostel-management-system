<?php

namespace App\Http\Controllers;

use App\Models\StudentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
}