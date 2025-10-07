<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use DB;
use Exception;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::where('company_id', 1)->orderBy('id', 'desc')->paginate(20);
        return view('backend.patients.index', compact('patients'));
    }

    public function create()
    {
        return view('backend.patients.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:patients,email',
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string',
        ]);

        $validated['company_id'] = 1;

        try {
            Patient::create($validated);
            return redirect()->route('admin.patients.index')->with('success', 'Patient added successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed: ' . $e->getMessage());
        }
    }

      public function show($id)
    {
        $patient = Patient::with(['appointments', 'labResults'])->findOrFail($id);

        return view('backend.patients.show', compact('patient'));
    }
    public function edit(Patient $patient)
    {
        return view('backend.patients.form', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:patients,email,' . $patient->id,
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string',
        ]);

        try {
            $patient->update($validated);
            return redirect()->route('admin.patients.index')->with('success', 'Patient updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }

    public function destroy(Patient $patient)
    {
        try {
            $patient->delete();
            return redirect()->route('admin.patients.index')->with('success', 'Patient deleted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Delete failed: ' . $e->getMessage());
        }
    }
}
