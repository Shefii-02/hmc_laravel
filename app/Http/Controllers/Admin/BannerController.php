<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helpers\MediaHelper;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;


class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::with('company')->orderBy('order','ASC')->paginate(10);
        return view('backend.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('backend.banners.form');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link' => 'nullable|url',
            'status' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        DB::beginTransaction();
        try {

            $fileId = null;

            if ($request->hasFile('image')) {
                // Upload using MediaHelper
                $fileId = MediaHelper::uploadCompanyFile(
                    1,          // company_id, replace with dynamic value if available
                    'banners',
                    $request->file('image')
                );
            }

            // Prepare data for Banner creation
            $bannerData = [
                'company_id' => 1,   // replace with dynamic company_id if needed
                'title' => $validated['title'] ?? null,
                'subtitle' => $validated['subtitle'] ?? null,
                'link' => $validated['link'] ?? null,
                'is_active' => $validated['status'] == '1' ? true : false,
                'order' => $validated['order'] ?? 0,
                'image_id' => $fileId,
            ];

            // Create banner
            Banner::create($bannerData);

            DB::commit();
            return redirect()->route('admin.banners.index')
                ->with('success', 'Banner created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Banner creation failed: ' . $e->getMessage());
        }
    }

    public function edit(Banner $banner)
    {
        return view('backend.banners.form', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link' => 'nullable|url',
            'status' => 'boolean',
            'order' => 'integer',
        ]);

        // Check if a new image was uploaded
        if ($request->hasFile('image')) {

            // Remove old image if exists
            if ($banner->image_id) {
                MediaHelper::removeCompanyFile($banner->image_id);
            }

            // Upload new image to company-specific folder
            $imageId = MediaHelper::uploadCompanyFile(
                $banner->company_id,
                'banners',
                $request->file('image')
            );

            $validated['image_id'] = $imageId;
        }


        $validated['is_active'] = $request->status == '1' ? 1 : 0;

        // Update the banner record
        $banner->update($validated);

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Banner updated successfully.');
    }



    public function destroy(Banner $banner)
    {
        // Delete associated image from storage & DB
        if ($banner->image_id) {
            MediaHelper::removeCompanyFile($banner->image_id);
        }

        // Delete the banner
        $banner->delete();
        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully.');
    }
}
