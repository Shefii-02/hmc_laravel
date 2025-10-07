<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LabResult;
use App\Models\Patient;
use Illuminate\Http\Request;
use DB;
use Exception;
use App\Helpers\MediaHelper;

class LabResultController extends Controller
{
    public function index()
    {
        $labResults = LabResult::with('patient')
            ->where('company_id', 1)
            ->orderBy('test_date', 'desc')
            ->paginate(20);

        return view('backend.lab_results.index', compact('labResults'));
    }

    public function create()
    {
        $patients = Patient::where('company_id', 1)->get();
        return view('backend.lab_results.form', compact('patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'test_name' => 'required|string|max:255',
            'result_file' => 'nullable|file|mimes:pdf,jpg,png,doc,docx|max:2048',
            'test_date' => 'nullable|date',
            'remarks' => 'nullable|string',
        ]);

        $validated['company_id'] = 1;

        if ($request->hasFile('result_file')) {
            $fileId = MediaHelper::uploadCompanyFile(1, 'lab_results', $request->file('result_file'));
            $validated['result_file'] = $fileId;
        }

        try {
            LabResult::create($validated);
            return redirect()->route('admin.lab-results.index')->with('success', 'Lab result added successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed: ' . $e->getMessage());
        }
    }

    public function edit(LabResult $labResult)
    {
        $patients = Patient::where('company_id', 1)->get();
        return view('backend.lab_results.form', compact('labResult', 'patients'));
    }

    public function update(Request $request, LabResult $labResult)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'test_name' => 'required|string|max:255',
            'result_file' => 'nullable|file|mimes:pdf,jpg,png,doc,docx|max:2048',
            'test_date' => 'nullable|date',
            'remarks' => 'nullable|string',
        ]);

        if ($request->hasFile('result_file')) {
            if ($labResult->result_file) {
                MediaHelper::removeCompanyFile($labResult->result_file);
            }

            $fileId = MediaHelper::uploadCompanyFile(1, 'lab_results', $request->file('result_file'));
            $validated['result_file'] = $fileId;
        }

        try {
            $labResult->update($validated);
            return redirect()->route('admin.lab-results.index')->with('success', 'Lab result updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }

    public function destroy(LabResult $labResult)
    {
        try {
            if ($labResult->result_file) {
                MediaHelper::removeCompanyFile($labResult->result_file);
            }

            $labResult->delete();
            return redirect()->route('admin.lab-results.index')->with('success', 'Lab result deleted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Delete failed: ' . $e->getMessage());
        }
    }
}
