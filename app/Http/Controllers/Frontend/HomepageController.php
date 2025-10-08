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
    public function doctorSingle() {}

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
            // 'g-recaptcha-response' => 'required|captcha', // validate reCAPTCHA
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
}
