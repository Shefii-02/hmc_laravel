<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Department;
use App\Helpers\MediaHelper;
use Carbon\Carbon;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::orderBy('order')->get();

        return view('backend.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $departments = Department::orderBy('name')->get();
        return view('backend.doctors.form', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'designation'      => 'nullable|string|max:255',
            'qualification'    => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'bio'      => 'nullable|string',
            'department_ids'    => 'required',
            'photo'            => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status'           => 'boolean',
            'order'            => 'nullable|integer',
        ]);


        $doctor = new Doctor($validated);
        $doctor->company_id = 1;

        if ($request->hasFile('photo')) {
            $photoId = MediaHelper::uploadCompanyFile(
                $doctor->company_id,
                'doctors',
                $request->file('photo')
            );
            $doctor->photo = $photoId;
        }

        $doctor->slug = Str::slug($doctor->name);

        $doctor->timeSlots()->delete(); // clear old slots first

        if ($request->has('time_slots')) {
            foreach ($request->time_slots as $day => $slots) {
                $startTimes = $slots['start'] ?? [];
                $endTimes = $slots['end'] ?? [];

                foreach ($startTimes as $index => $start) {
                    if (!empty($start) && !empty($endTimes[$index])) {
                        $doctor->timeSlots()->create([
                            'day' => $day,
                            'start_time' => $start,
                            'end_time' => $endTimes[$index],
                        ]);
                    }
                }
            }
        }

        $doctor->save();

        $doctor->doctor_department()->sync($request->input('department_ids', []));

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor created successfully.');
    }

    public function edit(Doctor $doctor)
    {
        $departments = Department::orderBy('name')->get();
        return view('backend.doctors.form', compact('doctor', 'departments'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'designation'      => 'nullable|string|max:255',
            'qualification'    => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'bio'              => 'nullable|string',
            'department_ids'   => 'required',
            'photo'            => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status'           => 'boolean',
            'order'            => 'nullable|integer',
        ]);

        $doctor->fill($validated);

        if ($request->hasFile('photo')) {
            if ($doctor->photo_id) {
                MediaHelper::removeCompanyFile($doctor->photo_id);
            }

            $photoId = MediaHelper::uploadCompanyFile(
                $doctor->company_id,
                'doctors',
                $request->file('photo')
            );
            $doctor->photo = $photoId;
        }

        $doctor->slug = Str::slug($doctor->name);

        $doctor->timeSlots()->delete(); // clear old slots first

        if ($request->has('time_slots')) {
            foreach ($request->time_slots as $day => $slots) {
                $startTimes = $slots['start'] ?? [];
                $endTimes = $slots['end'] ?? [];

                foreach ($startTimes as $index => $start) {
                    if (!empty($start) && !empty($endTimes[$index])) {
                        $doctor->timeSlots()->create([
                            'day' => $day,
                            'start_time' => $start,
                            'end_time' => $endTimes[$index],
                        ]);
                    }
                }
            }
        }

        $doctor->save();

        $doctor->doctor_department()->sync($request->input('department_ids', []));


        return redirect()->route('admin.doctors.index')->with('success', 'Doctor updated successfully.');
    }

    public function destroy(Doctor $doctor)
    {
        if ($doctor->photo_id) {
            MediaHelper::removeCompanyFile($doctor->photo_id);
        }

        $doctor->delete();

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor deleted successfully.');
    }

     public function getAvailability(Doctor $doctor, $date)
    {
        $dayName = strtolower(date('l', strtotime($date))); // monday, tuesday etc.

        $availability = $doctor->availabilities()
            ->where('day', $dayName)
            ->get(['start_time', 'end_time']);

        return response()->json($availability);
    }
    public function getAvailableDays(Doctor $doctor)
    {
        // Return unique days where doctor has availability
        $days = $doctor->availabilities()
            ->select('day')
            ->distinct()
            ->pluck('day');

        return response()->json($days);
    }

    public function getAvailableSlots($doctorId, $date)
    {
        $doctor = Doctor::findOrFail($doctorId);
        $dayName = strtolower(Carbon::parse($date)->format('l'));
        $slots = $doctor->availabilities()->where('day', $dayName)->get(['start_time', 'end_time']);
        return response()->json($slots);
    }


    // public function getAvailableSlots(Doctor $doctor, $day)
    // {
    //     $slots = $doctor->availabilities()
    //         ->where('day', strtolower($day))
    //         ->get(['id', 'start_time', 'end_time']);

    //     return response()->json($slots);
    // }
}
