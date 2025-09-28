<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/about-us', function () {
    return view('frontend.about-us');
});

Route::get('/our-doctors', function () {
    return view('frontend.our-doctors');
});


Route::get('/contact-us', function () {
    return view('frontend.contact-us');
});



Route::get('/blog', function () {
    return view('frontend.blog');
});

Route::get('/department/{slug}', function ($slug) {
    $slug = strtolower($slug); // lowercase the slug

    $departments = [
        'general-medicine' => ['title' => 'General Medicine', 'image' => 'https://via.placeholder.com/800x400', 'description'=>'...'],
        'dermatology' => ['title'=>'Dermatology', 'image'=>'...', 'description'=>'...'],
        'orthopaedics' => ['title'=>'Orthopaedics', 'image'=>'...', 'description'=>'...'],
        'ent' => ['title'=>'ENT', 'image'=>'...', 'description'=>'...'],
        // ... add all departments in lowercase keys
    ];

    if (!isset($departments[$slug])) {
        abort(404); // slug not found
    }

    $department = $departments[$slug];

    return view('frontend.department', compact('department', 'slug'));
});


Route::get('/service/{slug}', function ($slug) {
    // Dummy services data
    $services = [
        'laboratory' => [
            'title' => 'Laboratory',
            'image' => 'https://via.placeholder.com/800x400',
            'description' => 'Our laboratory provides a wide range of diagnostic tests with accurate results.',
        ],
        'pharmacy' => [
            'title' => 'Pharmacy',
            'image' => 'https://via.placeholder.com/800x400',
            'description' => '24/7 pharmacy services with all essential medicines available.',
        ],
        'endoscopy' => [
            'title' => 'Endoscopy',
            'image' => 'https://via.placeholder.com/800x400',
            'description' => 'Endoscopic procedures with advanced technology for accurate diagnosis.',
        ],
        'ecg' => [
            'title' => 'ECG',
            'image' => 'https://via.placeholder.com/800x400',
            'description' => 'Electrocardiogram services to monitor heart health.',
        ],
        'emergency-care' => [
            'title' => 'Emergency Care',
            'image' => 'https://via.placeholder.com/800x400',
            'description' => '24/7 emergency services with highly trained staff.',
        ],
        // Add more services here
    ];

    // Check if slug exists
    if (!array_key_exists($slug, $services)) {
        abort(404);
    }

    $service = $services[$slug];

    // List of all services for sidebar or menu
    $serviceList = array_map(fn($key, $val) => ['slug'=>$key, 'title'=>$val['title']], array_keys($services), $services);

    return view('frontend.service', compact('service', 'serviceList', 'slug'));
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// public function index(Request $request)
// {
//     $tab = $request->query('tab', 'news-and-events');

//     // Fetch data based on tab
//     switch($tab) {
//         case 'articles':
//             $items = \App\Models\Article::latest()->paginate(6);
//             break;
//         case 'vlogs':
//             $items = \App\Models\Vlog::latest()->paginate(6);
//             break;
//         case 'news-and-events':
//         default:
//             $items = \App\Models\News::latest()->paginate(6);
//             break;
//     }

//     return view('blog.index', [
//         'tab' => $tab,
//         'items' => $items
//     ]);
// }
