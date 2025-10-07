<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User; // Doctors
use Illuminate\Http\Request;
use DB;
use Exception;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['patient', 'doctor'])
            ->where('company_id', 1)
            ->orderBy('appointment_time', 'desc')
            ->paginate(20);

        return view('backend.appointments.index', compact('appointments'));
    }

    public function create()
    {
        $patients = Patient::where('company_id', 1)->get();
        $doctors = Doctor::where('company_id', 1)->get();
        return view('backend.appointments.form', compact('patients', 'doctors'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'patient_id' => 'nullable|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_time' => 'required|date',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'notes' => 'nullable|string',
            'full_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'new_name' => 'nullable|string|max:255',
            'new_mobile' => 'nullable|string|max:20',
            'new_email' => 'nullable|email|max:255',
        ]);

        try {
            // ✅ Determine Patient ID (existing or new)
            if ($request->filled('patient_id')) {
                // Existing patient selected
                $patientId = $request->patient_id;
            } else {
                // Create or check existing patient by phone/email
                $patientId = $this->checkExistingCutomer(
                    $request->new_name,
                    $request->new_mobile,
                    $request->new_email
                );
            }

            // ✅ Prepare appointment data
            $appointmentData = [
                'company_id'       => 1,
                'patient_id'       => $patientId,
                'doctor_id'        => $request->doctor_id,
                'appointment_time' => $request->appointment_time,
                'status'           => $request->status,
                'notes'            => $request->notes,
            ];

            Appointment::create($appointmentData);

            return redirect()->route('admin.appointments.index')
                ->with('success', 'Appointment added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create appointment: ' . $e->getMessage());
        }
    }

    private function checkExistingCutomer($name, $phone, $email)
    {
        $patient = Patient::where('phone', $phone)
            ->where('email', $email)
            ->where('full_name', $name)
            ->first();

        if ($patient) {
            return $patient->id;
        }

        // Create new patient
        $newPatient = Patient::create([
            'company_id' => 1,
            'full_name'  => $name,
            'phone'      => $phone,
            'email'      => $email,
        ]);

        return $newPatient->id;
    }



    public function edit(Appointment $appointment)
    {
        $patients = Patient::where('company_id', 1)->get();
        $doctors = Doctor::where('company_id', 1)->get();
        return view('backend.appointments.edit', compact('appointment', 'patients', 'doctors'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'patient_id' => 'nullable|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_time' => 'required|date',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'notes' => 'nullable|string',
        ]);

        try {
            $appointment->update($validated);
            return redirect()->route('admin.appointments.index')->with('success', 'Appointment updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }

    public function destroy(Appointment $appointment)
    {
        try {
            $appointment->delete();
            return redirect()->route('admin.appointments.index')->with('success', 'Appointment deleted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Delete failed: ' . $e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $query = $request->get('q');

        $patients = Patient::where('full_name', 'like', "%{$query}%")
            ->orWhere('phone', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->limit(10)
            ->get();

        return response()->json($patients);
    }

    public function storeAjax(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'nullable|email',
        ]);

        $patient = Patient::create([
            'full_name' => $validated['name'],
            'mobile' => $validated['mobile'],
            'email' => $validated['email'] ?? null,
        ]);

        return response()->json($patient);
    }
}
