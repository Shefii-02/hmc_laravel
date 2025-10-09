<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\MediaHelper;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Article;
use App\Models\Banner;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\GalleryGroup;
use App\Models\GalleryItem;
use App\Models\NewsEvent;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User; // Doctors
use App\Models\Vlog;
use Illuminate\Http\Request;
use DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Mail\ContactFormSubmitted;
use App\Models\LabResult;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class HomepageController extends Controller
{

    public function index()
    {
        $banners     = Banner::where('is_active', 1)->orderBy('order', 'ASC')->get();
        $departments = Department::where('is_active', 1)->orderBy('order', 'ASC')->get();
        $doctors     = Doctor::where('is_active', 1)->orderBy('order', 'ASC')->get();
        $vlogs       = Vlog::where('status', 'published')->orderBy('order', 'ASC')->get();
        $news_events = NewsEvent::where('status', 'published')->orderBy('order', 'ASC')->limit(4)->get();
        $testimonials = Testimonial::where('is_active', 1)->orderBy('order', 'ASC')->get();

        return view('frontend.index', compact('banners', 'departments', 'doctors', 'vlogs', 'news_events', 'testimonials'));
    }


    public function ourDoctors()
    {
        $doctors = Doctor::where('is_active', 1)->orderBy('order', 'ASC')->get();
        return view('frontend.our-doctors', compact('doctors'));
    }

    public function departments()
    {
        $departments = Department::where('is_active', 1)->orderBy('order', 'ASC')->get();
        return view('frontend.departments', compact('departments'));
    }
    public function departmentSingle($slug)
    {
        $department = Department::where('is_active', 1)->where('slug', $slug)->first() ?? abort(404);
        $deptList =  Department::where('is_active', 1)->orderBy('order', 'ASC')->get();
        return view('frontend.department', compact('department', 'deptList'));
    }
    public function services()
    {
        $services = Service::where('is_active', 1)->orderBy('order', 'ASC')->get();
        return view('frontend.services', compact('services'));
    }
    public function serviceSingle($slug)
    {
        $service     = Service::where('is_active', 1)->where('slug', $slug)->first() ?? abort(404);
        $serviceList = Service::where('is_active', 1)->orderBy('order', 'ASC')->get();
        return view('frontend.service', compact('service', 'serviceList'));
    }
    public function doctorSingle($slug)
    {
        $doctor = Doctor::where('slug', $slug)->first() ?? abort(404);
        return view('frontend.doctor', compact('doctor'));
    }
    public function doctorSingleAppointment($slug,Request $request) {
        $doctor = Doctor::where('slug', $slug)->first() ?? abort(404);
         $validated = $request->validate([
            'appointment_date' => 'required',
            'appointment_time' => 'required',
            'notes' => 'nullable|string',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        try {

            // Create or check existing patient by phone/email
            $patientId = $this->checkExistingCutomer(
                $request->full_name,
                $request->phone,
                $request->email
            );

            // ✅ Prepare appointment data
            $appointmentData = [
                'company_id'       => 1,
                'patient_id'       => $patientId,
                'doctor_id'        => $doctor->id,
                'appointment_date' => $request->appointment_date,
                'appointment_time' => $request->appointment_time,
                'status'           => 'pending',
                'notes'            => $request->notes,
            ];

            Appointment::create($appointmentData);

            return redirect()->back()->with('success', 'Appointment booked successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create appointment: ' . $e->getMessage());
        }

    }


    public function blog(Request $request)
    {
        $tab = $request->query('tab', 'articles'); // Default tab = vlogs

        switch ($tab) {
            case 'articles':
                $items = Article::latest()->paginate(6);
                break;
            case 'news-and-events':
                $items = NewsEvent::latest()->paginate(6);
                break;
            case 'vlogs':
            default:
                $items = Vlog::latest()->paginate(6);
                break;
        }

        $tabs = [
            'news-and-events' => ['title' => 'News & Events', 'icon' => 'bi bi-newspaper'],
            'articles' => ['title' => 'Articles', 'icon' => 'bi bi-journal-text'],
            'vlogs' => ['title' => 'Vlogs', 'icon' => 'bi bi-camera-video'],
        ];

        return view('frontend.blog', compact('items', 'tabs', 'tab'));
    }


    public function blogShow($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $vlog = Vlog::where('slug', $slug)->first();
        $newsEvent = NewsEvent::where('slug', $slug)->first();

        // Find which type the slug belongs to
        $item = $article ?? $vlog ?? $newsEvent;

        if (!$item) {
            abort(404, 'Blog post not found');
        }

        // Determine type for breadcrumb or layout
        $type = $article ? 'article' : ($vlog ? 'vlog' : 'news');

        return view('frontend.blog_show', compact('item', 'type'));
    }


    public function galleries()
    {
        $gallery_groups = GalleryGroup::where('is_active', 1)->get();
        return view('frontend.gallery_group', compact('gallery_groups'));
    }
    public function gallery($slug)
    {
        $gallery_group = GalleryGroup::where('slug', $slug)->where('is_active', 1)->first() ?? abort(404);
        $gallery_items  = GalleryItem::where('gallery_group_id', $gallery_group->id)->get();
        return view('frontend.gallery', compact('gallery_group', 'gallery_items'));
    }


    public function submitContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|max:10', // Adjust max length as needed
            'subject' => 'required|string|max:255',
            'g-recaptcha-response' => 'required|captcha', // validate reCAPTCHA
        ]);



        try {

            $to = "shefii.indigital@gmail.com";
            $subject = "New Contact Form Submission";
            $headers = "From: no-reply@industrial.gadgeon.com\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $message = new ContactFormSubmitted(
                $request->input('name'),
                $request->input('email'),
                $request->input('mobile'),
                $request->input('subject'),
                $request->input('message'),
                'business'
            );
            $message = $message->render();

            mail($to, $subject, $message, $headers);

            $to = $request->input('email');
            $subject = "Thank You for Contacting Us";
            $headers = "From: no-reply@industrial.gadgeon.com\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $message = new ContactFormSubmitted(
                $request->input('name'),
                $request->input('email'),
                $request->input('mobile'),
                $request->input('subject'),
                $request->input('message'),
                'customer'
            );
            $message = $message->render();

            mail($to, $subject, $message, $headers);

            return redirect()->back()->with('success', 'Email sending successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Email sending failed: ' . $e->getMessage());
        }
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



    public function bookNow()
    {
        $doctors =  Doctor::where('is_active', 1)->orderBy('order', 'ASC')->get();
        return view('frontend.book-now', compact('doctors'));
    }
    public function bookNowStore(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required',
            'appointment_time' => 'required',
            'notes' => 'nullable|string',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',

        ]);

        // dd($request->all());

        try {

            // Create or check existing patient by phone/email
            $patientId = $this->checkExistingCutomer(
                $request->full_name,
                $request->phone,
                $request->email
            );

            // ✅ Prepare appointment data
            $appointmentData = [
                'company_id'       => 1,
                'patient_id'       => $patientId,
                'doctor_id'        => $request->doctor_id,
                'appointment_date' => $request->appointment_date,
                'appointment_time' => $request->appointment_time,
                'status'           => 'pending',
                'notes'            => $request->notes,
            ];

            Appointment::create($appointmentData);

            return redirect()->back()->with('success', 'Appointment booked successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create appointment: ' . $e->getMessage());
        }
    }
    public function labResult()
    {
        return view('frontend.lab-result');
    }
    public function labResultGet(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        $full_name = $request->full_name;
        $phone     = $request->phone;
        $email     = $request->email;

        $patient = Patient::where('phone', $phone)
            ->where('email', $email)
            ->where('full_name', $full_name)
            ->first();

        if ($patient) {
            $results = LabResult::where('patient_id', $patient->id)->get();
            return view('frontend.lab-result-list', compact('results'));
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Patient Information Incorrect');
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
}
