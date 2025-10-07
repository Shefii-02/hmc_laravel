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
        'general-medicine' => ['title' => 'General Medicine', 'image' => 'https://via.placeholder.com/800x400', 'description' => '...'],
        'dermatology' => ['title' => 'Dermatology', 'image' => '...', 'description' => '...'],
        'orthopaedics' => ['title' => 'Orthopaedics', 'image' => '...', 'description' => '...'],
        'ent' => ['title' => 'ENT', 'image' => '...', 'description' => '...'],
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
    $serviceList = array_map(fn($key, $val) => ['slug' => $key, 'title' => $val['title']], array_keys($services), $services);

    return view('frontend.service', compact('service', 'serviceList', 'slug'));
});
//
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth']], function () {


    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/home', 'DashboardController@index')->name('home');

    Route::resource('banners', BannerController::class);
    Route::resource('doctors', DoctorController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('galleries', GalleryGroupController::class)->names('gallery_groups');
    Route::resource('gallery', GalleryItemController::class)->names('gallery_items');
    Route::resource('testimonials', TestimonialController::class);
    Route::group(['prefix' => 'blogs', 'as' => 'blogs.',], function () {
        Route::resource('news-events', NewsEventController::class);
        Route::resource('articles', ArticleController::class);
        Route::resource('vlogs', VlogController::class);
    });

    Route::get('patients/search', "AppointmentController@search")->name('patients.search');
    Route::post('patients/store-ajax', "AppointmentController@storeAjax")->name('patients.storeAjax');
    Route::resource('patients', PatientController::class);

    Route::resource('appointments', AppointmentController::class);
    Route::resource('staff', StaffController::class);


    Route::resource('lab-results', LabResultController::class);

    Route::get('/account/settings', 'AccountController@edit')->name('account.edit');
    Route::put('/account/settings', 'AccountController@update')->name('account.update');

    Route::resource('staffs', BannerController::class);
});


Auth::routes();

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
