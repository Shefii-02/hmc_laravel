<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Patient;
use App\Models\Doctor;

class DashboardController extends Controller
{
    public function index()
    {
        // Upcoming Appointments (next 7 days)
        $upcomingAppointments = Appointment::with(['patient', 'doctor'])
            ->where('appointment_time', '>=', now())
            ->orderBy('appointment_time', 'asc')
            ->limit(6)
            ->get();

        $weekDays = collect();
        for ($i = 0; $i < 7; $i++) {
            $day = now()->addDays($i);
            $appointments = Appointment::with(['patient', 'doctor'])
                ->whereDate('appointment_time', $day->toDateString())
                ->orderBy('appointment_time', 'asc')
                ->get();

            $weekDays->push([
                'date' => $day->toDateString(),
                'dayName' => $day->format('l'),
                'appointments' => $appointments,
            ]);
        }

        // Available Departments
        $departments = Department::limit(7)->get();

        // Statistics
        $totalPatients = Patient::count();
        $totalAppointments = Appointment::count();
        $totalDoctors = Doctor::count();
        $totalDepartments = Department::count();

        return view('backend.dashboard', compact(
            'upcomingAppointments',
            'departments',
            'totalPatients',
            'totalAppointments',
            'totalDoctors',
            'totalDepartments',
            'weekDays'
        ));
    }
}
