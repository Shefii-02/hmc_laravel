<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\MediaHelper;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Banner;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\NewsEvent;
use App\Models\Patient;
use App\Models\Testimonial;
use App\Models\User; // Doctors
use App\Models\Vlog;
use Illuminate\Http\Request;
use DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomepageController extends Controller
{

    public function index()
    {
        $banners     = Banner::where('is_active',1)->orderBy('order','ASC')->get();
        $departments = Department::where('is_active',1)->orderBy('order','ASC')->get();
        $doctors     = Doctor::where('is_active',1)->orderBy('order','ASC')->get();
        $vlogs       = Vlog::where('status','published')->orderBy('order','ASC')->get();
        $news_events = NewsEvent::where('status','published')->orderBy('order','ASC')->limit(4)->get();
        $testimonials= Testimonial::where('is_active',1)->orderBy('order','ASC')->get();

        return view('frontend.index',compact('banners','departments','doctors','vlogs','news_events','testimonials'));
    }
}
