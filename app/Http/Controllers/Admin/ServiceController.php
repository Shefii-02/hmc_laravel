<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Helpers\MediaHelper;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('backend.services.index', compact('services'));
    }

    public function create()
    {
        return view('backend.services.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'main_image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'is_active' => 'boolean',
            'order'       => 'nullable|integer',
        ]);

        $service = new Service();
        $service->company_id = 1;
        $service->title = $validated['title'];
        $service->description = $validated['description'] ?? null;
        $service->is_active = $validated['is_active'] ?? true;

        if ($request->hasFile('thumbnail_file')) {
            $service->thumbnail = MediaHelper::uploadCompanyFile($service->company_id, 'services/thumbnails', $request->file('thumbnail_file'));
        }

        if ($request->hasFile('main_image_file')) {
            $service->main_image = MediaHelper::uploadCompanyFile($service->company_id, 'services/main', $request->file('main_image_file'));
        }

        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('backend.services.form', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'main_image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'is_active' => 'boolean',
            'order'       => 'nullable|integer',
        ]);

        if ($request->hasFile('thumbnail_file')) {
            if ($service->thumbnail) {
                MediaHelper::removeCompanyFile($service->thumbnail);
            }
            $service->thumbnail = MediaHelper::uploadCompanyFile($service->company_id, 'services/thumbnails', $request->file('thumbnail_file'));
        }


        if ($request->hasFile('main_image_file')) {
            if ($service->main_image) {
                MediaHelper::removeCompanyFile($service->main_image);
            }
            $service->main_image = MediaHelper::uploadCompanyFile($service->company_id, 'services/main', $request->file('main_image_file'));
        }

        $service->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'is_active' => $validated['is_active'] ?? true,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->thumbnail) {
            MediaHelper::removeCompanyFile($service->thumbnail);
        }
        if ($service->main_image) {
            MediaHelper::removeCompanyFile($service->main_image);
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
