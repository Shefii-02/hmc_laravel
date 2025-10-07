<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryGroup;
use App\Models\GalleryItem;
use App\Helpers\MediaHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryGroupController extends Controller
{
    public function index()
    {
        $galleryGroups = GalleryGroup::where('company_id', 1)
            ->orderBy('order')
            ->paginate(10);

        return view('backend.gallery_groups.index', compact('galleryGroups'));
    }

    public function create()
    {
        return view('backend.gallery_groups.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        DB::beginTransaction();
        try {
            $group = new GalleryGroup();
            $group->company_id = 1;
            $group->fill($validated);

            if ($request->hasFile('main_image')) {
                $group->main_image = MediaHelper::uploadCompanyFile(
                    $group->company_id,
                    'gallery_groups',
                    $request->file('main_image')
                );
            }

            $group->save();

            DB::commit();
            return redirect()->route('admin.gallery_groups.index')->with('success', 'Gallery group created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to create group: ' . $e->getMessage());
        }
    }

    public function edit(GalleryGroup $galleryGroup)
    {
        return view('backend.gallery_groups.form', compact('galleryGroup'));
    }

    public function update(Request $request, GalleryGroup $galleryGroup)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('main_image')) {
            if ($galleryGroup->main_image) {
                MediaHelper::removeCompanyFile($galleryGroup->main_image);
            }

            $galleryGroup->main_image = MediaHelper::uploadCompanyFile(
                $galleryGroup->company_id,
                'gallery_groups',
                $request->file('main_image')
            );
        }

        $galleryGroup->update($validated);

        return redirect()->route('admin.gallery_groups.index')->with('success', 'Gallery group updated successfully.');
    }

    public function destroy(GalleryGroup $galleryGroup)
    {
        if ($galleryGroup->main_image) {
            MediaHelper::removeCompanyFile($galleryGroup->main_image);
        }

        $galleryGroup->delete();

        return redirect()->route('admin.gallery_groups.index')->with('success', 'Gallery group deleted successfully.');
    }
}
