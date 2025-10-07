<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryGroup;
use App\Models\GalleryItem;
use App\Helpers\MediaHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class GalleryItemController extends Controller
{
    public function index()
    {
        $galleryItems = GalleryItem::with('group')
            ->where('company_id', 1)
            ->latest()
            ->paginate(20);

        return view('backend.gallery_items.index', compact('galleryItems'));
    }

    public function create(Request $request)
    {
        $galleryGroup = GalleryGroup::where('company_id', 1)->where('id', $request->group)->first();
        $galleryItems = GalleryItem::where('company_id', 1)->where('gallery_group_id', $request->group)->get();
        return view('backend.gallery_items.form', compact('galleryGroup', 'galleryItems'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'gallery_group_id' => 'required|exists:gallery_groups,id',
    //         'images.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
    //     ]);

    //     DB::beginTransaction();
    //     try {
    //         foreach ($request->file('images', []) as $image) {
    //             $fileId = MediaHelper::uploadCompanyFile(1, 'gallery', $image);

    //             GalleryItem::create([
    //                 'company_id' => 1,
    //                 'gallery_group_id' => $request->gallery_group_id,
    //                 'image_path' => $fileId,
    //                 'is_active' => 1,
    //                 'order' => 0,
    //             ]);
    //         }

    //         DB::commit();
    //         return redirect()->route('admin.gallery_items.index')->with('success', 'Gallery images uploaded successfully.');
    //     } catch (Exception $e) {
    //         DB::rollBack();
    //         return redirect()->back()->with('error', 'Upload failed: ' . $e->getMessage());
    //     }
    // }

    public function edit(GalleryItem $galleryItem)
    {
        $galleryGroups = GalleryGroup::where('company_id', 1)->pluck('title', 'id');
        return view('backend.gallery_items.form_edit', compact('galleryItem', 'galleryGroups'));
    }

    public function update(Request $request, GalleryItem $galleryItem)
    {
        $request->validate([
            'gallery_group_id' => 'required|exists:gallery_groups,id',
            'title' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        try {
            // Replace image if uploaded
            if ($request->hasFile('image')) {
                if ($galleryItem->image_path) {
                    MediaHelper::removeCompanyFile($galleryItem->image_path);
                }

                $fileId = MediaHelper::uploadCompanyFile(1, 'gallery', $request->file('image'));
                $galleryItem->image_path = $fileId;
            }

            $galleryItem->update([
                'gallery_group_id' => $request->gallery_group_id,
                'title' => $request->title,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'order' => $request->order ?? 0,
            ]);

            return redirect()->route('admin.gallery_items.index')->with('success', 'Gallery item updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }

    // public function destroy(GalleryItem $galleryItem)
    // {
    //     try {
    //         if ($galleryItem->image_path) {
    //             MediaHelper::removeCompanyFile($galleryItem->image_path);
    //         }

    //         $galleryItem->delete();
    //         return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
    //     } catch (Exception $e) {
    //         return response()->json(['success' => false, 'message' => 'Delete failed: ' . $e->getMessage()]);
    //     }
    // }
    public function store(Request $request)
    {
        $request->validate([
            'gallery_group_id' => 'required|exists:gallery_groups,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        try {
            $uploadedItems = [];

            foreach ($request->file('images', []) as $image) {
                $fileId = MediaHelper::uploadCompanyFile(1, 'gallery', $image);

                $item = GalleryItem::create([
                    'company_id' => 1,
                    'gallery_group_id' => $request->gallery_group_id,
                    'title' => $image->getClientOriginalName(),
                    'image_path' => $fileId,
                    'is_active' => 1,
                ]);

                $item->refresh();

                $uploadedItems[] = [
                    'id' => $item->id,
                    'image_url' => $item->image_url,
                    'title' => $item->title,
                ];

            }

            if (count($uploadedItems) > 0) {
                return response()->json(['success' => true, 'item' => $uploadedItems[0]]);
            }

            return response()->json(['success' => false, 'message' => 'No images uploaded']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($galleryItem)
    {
        $galleryItem = GalleryItem::where('id', $galleryItem)->first();
        try {
            MediaHelper::removeCompanyFile($galleryItem->image_path);
            $galleryItem->delete();
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
