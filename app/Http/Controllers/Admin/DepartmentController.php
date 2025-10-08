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
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('order', 'asc')->paginate('10');
        return view('backend.departments.index', compact('departments'));
    }

    public function create()
    {

        return view('backend.departments.form');
    }

    /**
     * Store a newly created department in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'order'       => 'nullable|integer',
            'is_active'      => 'boolean',
            'icon'        => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'main_image'  => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ]);

        $department = new Department();
        $department->company_id = 1;
        $department->name        = $validated['name'];
        $department->slug        = Str::slug($validated['name']);
        $department->description = $validated['description'] ?? null;
        $department->order       = $validated['order'] ?? 0;
        $department->is_active      = $validated['status'] ?? 1;

        // Upload Icon
        if ($request->hasFile('thumbnail_file')) {
            $iconId = MediaHelper::uploadCompanyFile(
                $department->company_id,
                'departments/thumbaile',
                $request->file('thumbnail_file')
            );
            $department->thumb_image = $iconId;
        }

        // Upload Main Image
        if ($request->hasFile('main_image_file')) {
            $mainImageId = MediaHelper::uploadCompanyFile(
                $department->company_id,
                'departments/main_images',
                $request->file('main_image_file')
            );
            $department->main_image = $mainImageId;
        }



        $department->save();

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department created successfully.');
    }

    /**
     * Update the specified department.
     */
    public function update(Request $request, Department $department)
    {

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'order'       => 'nullable|integer',
            'is_active'      => 'boolean',
            'icon'        => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'main_image'  => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ]);

        $department->fill($validated);

        // Replace icon
        if ($request->hasFile('thumbnail_file')) {
            if ($department->thumb_image && $department->thumb_image != '') {

                MediaHelper::removeCompanyFile($department->thumb_image);
            }
            $iconId = MediaHelper::uploadCompanyFile(
                $department->company_id,
                'departments/thumbaile',
                $request->file('thumbnail_file')
            );
            $department->thumb_image = $iconId;
        }

        // Replace main image
        if ($request->hasFile('main_image_file')) {
            if ($department->main_image && $department->main_image != '') {

                MediaHelper::removeCompanyFile($department->main_image);
            }
            $mainImageId = MediaHelper::uploadCompanyFile(
                $department->company_id,
                'departments/main_images',
                $request->file('main_image_file')
            );
            $department->main_image = $mainImageId;
        }

        $department->slug = Str::slug($department->name);

        $department->save();

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified department from storage.
     */
    public function destroy(Department $department)
    {
        // Remove files
        if ($department->thumb_image) {
            MediaHelper::removeCompanyFile($department->thumb_image);
        }
        if ($department->main_image) {
            MediaHelper::removeCompanyFile($department->main_image);
        }

        $department->delete();

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department deleted successfully.');
    }



    public function edit(Department $department)
    {

        return view('backend.departments.form', compact('department'));
    }
}
