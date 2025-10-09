<?php

use App\Models\Article;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function () {
    Route::get('/', 'HomepageController@index')->name('index');

    Route::get('/about-us', function () {
        return view('frontend.about-us');
    })->name('about-us');

    Route::get('/contact-us', function () {
        return view('frontend.contact-us');
    })->name('contact-us');

    Route::post('/contact-us', 'HomepageController@submitContactForm')->name('submit.contact.form');



    Route::get('departments', 'HomepageController@departments')->name('departments');
    Route::get('department/{slug}', 'HomepageController@departmentSingle')->name('department-single');

    Route::get('services', 'HomepageController@services')->name('services');
    Route::get('service/{slug}', 'HomepageController@serviceSingle')->name('service.single');


    Route::get('our-doctors', 'HomepageController@ourDoctors')->name('our-doctors');
    Route::get('/doctor/{doctor}/days', 'HomepageController@getAvailableDays')->name('doctor.days');
    Route::get('/doctor/{doctor}/day/{day}', 'HomepageController@getAvailableSlots')->name('doctor.slots');

    Route::get('doctor/{slug}', 'HomepageController@doctorSingle')->name('doctor.single');
    Route::post('doctor/{slug}', 'HomepageController@doctorSingleAppointment')->name('doctor.appointment');

    Route::get('/blog', 'HomepageController@blog')->name('blog');
    Route::get('/blog/{slug}', 'HomepageController@blogShow')->name('blog.show');

    Route::get('/arogyam-njagalilude', 'HomepageController@blog')->name('arogyam-njagalilude');

    Route::get('book-now', 'HomepageController@bookNow')->name('book-now');
    Route::post('book-now', 'HomepageController@bookNowStore')->name('book-now.store');
    Route::get('lab-result', 'HomepageController@labResult')->name('lab-result');
    Route::post('lab-result', 'HomepageController@labResultGet')->name('lab-result-get');


    Route::get('galleries', 'HomepageController@galleries')->name('galleries');
    Route::get('gallery/{slug}', 'HomepageController@gallery')->name('gallery');

    // Route::get('/department/{slug}', function ($slug) {
    //     $slug = strtolower($slug); // lowercase the slug

    //     $departments = [
    //         'general-medicine' => ['title' => 'General Medicine', 'image' => 'https://via.placeholder.com/800x400', 'description' => '...'],
    //         'dermatology' => ['title' => 'Dermatology', 'image' => '...', 'description' => '...'],
    //         'orthopaedics' => ['title' => 'Orthopaedics', 'image' => '...', 'description' => '...'],
    //         'ent' => ['title' => 'ENT', 'image' => '...', 'description' => '...'],
    //         // ... add all departments in lowercase keys
    //     ];

    //     if (!isset($departments[$slug])) {
    //         abort(404); // slug not found
    //     }

    //     $department = $departments[$slug];

    //     return view('frontend.department', compact('department', 'slug'));
    // })->name('department-single');


    // Route::get('/service/{slug}', function ($slug) {
    //     // Dummy services data
    //     $services = [
    //         'laboratory' => [
    //             'title' => 'Laboratory',
    //             'image' => 'https://via.placeholder.com/800x400',
    //             'description' => 'Our laboratory provides a wide range of diagnostic tests with accurate results.',
    //         ],
    //         'pharmacy' => [
    //             'title' => 'Pharmacy',
    //             'image' => 'https://via.placeholder.com/800x400',
    //             'description' => '24/7 pharmacy services with all essential medicines available.',
    //         ],
    //         'endoscopy' => [
    //             'title' => 'Endoscopy',
    //             'image' => 'https://via.placeholder.com/800x400',
    //             'description' => 'Endoscopic procedures with advanced technology for accurate diagnosis.',
    //         ],
    //         'ecg' => [
    //             'title' => 'ECG',
    //             'image' => 'https://via.placeholder.com/800x400',
    //             'description' => 'Electrocardiogram services to monitor heart health.',
    //         ],
    //         'emergency-care' => [
    //             'title' => 'Emergency Care',
    //             'image' => 'https://via.placeholder.com/800x400',
    //             'description' => '24/7 emergency services with highly trained staff.',
    //         ],
    //         // Add more services here
    //     ];

    //     // Check if slug exists
    //     if (!array_key_exists($slug, $services)) {
    //         abort(404);
    //     }

    //     $service = $services[$slug];

    //     // List of all services for sidebar or menu
    //     $serviceList = array_map(fn($key, $val) => ['slug' => $key, 'title' => $val['title']], array_keys($services), $services);

    //     return view('frontend.service', compact('service', 'serviceList', 'slug'));
    // });


});





// Route::get('/blog', function () {
//     return view('frontend.blog');
// });



// Route::get('/article', function () {
//     // Increase time and memory limit for this operation
//     ini_set('max_execution_time', 0); // 0 = unlimited
//     ini_set('memory_limit', '512M');  // increase memory if needed

//     // ✅ URL of your Core PHP API
//     $apiUrl = "https://old.hayathmedicare.in/get_media?page=1&limit=1";
//     // wait up to 120 seconds

//     // Fetch data
//     $response = Http::timeout(1200)->connectTimeout(300)->get($apiUrl);

//     if (!$response->ok()) {
//         return response()->json(['error' => 'Failed to fetch API data'], 500);
//     }

//     $data = $response->json();

//     if (!isset($data['data'])) {
//         return response()->json(['error' => 'Invalid API response'], 500);
//     }



//     // ✅ Store or Update data
//     foreach ($data['data'] as $item) {
//         $article = Article::where('slug', $item['id'])->first();
//             $imagePath = saveBase64Image($item['image'] ?? 'media');
//         $article->image = $imagePath;
//         $article->save();
//     }

//     return response()->json([
//         'status' => 'success',
//         'message' => 'Media imported successfully',
//         'count' => count($data['data'])
//     ]);
// });

// function saveBase64Image($base64String, $folder = 'media')
// {
//     Log::info($base64String);
//     // Check if base64 string exists and looks valid
//     if (!$base64String || !str_contains($base64String, 'base64,')) {

//         return null;
//     }

//     // Extract image type and data
//     [$type, $data] = explode(';', $base64String);
//     [, $data] = explode(',', $data);
//     $imageType = str_replace('data:image/', '', $type);
//     $imageType = $imageType === 'jpeg' ? 'jpg' : $imageType;

//     // Decode base64 data
//     $imageData = base64_decode($data);

//     // Create unique filename
//     $fileName = Str::uuid() . '.' . $imageType;

//     // Save to storage/app/public/media
//     Storage::disk('public')->put("{$folder}/{$fileName}", $imageData);
//     Log::info("storage/{$folder}/{$fileName}");
//     // Return full path for database storage
//     return "storage/{$folder}/{$fileName}";
// }


//
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth']], function () {


    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/home', 'DashboardController@index')->name('home');

    Route::resource('banners', BannerController::class);

    Route::get('/doctor/{doctor}/days', 'DoctorController@getAvailableDays')->name('doctor.days');
    Route::get('/doctor/{doctor}/day/{day}', 'DoctorController@getAvailableSlots')->name('doctor.slots');

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
