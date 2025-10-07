<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Helpers\MediaHelper;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('backend.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('backend.testimonials.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
        ]);

        $testimonial = new Testimonial();
        $testimonial->company_id = 1;
        $testimonial->fill($validated);

        if ($request->hasFile('image')) {
            $testimonial->photo = MediaHelper::uploadCompanyFile(
                $testimonial->company_id,
                'testimonials',
                $request->file('image')
            );
        }

        $testimonial->save();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('backend.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($testimonial->photo) {
                MediaHelper::removeCompanyFile($testimonial->photo);
            }

            $testimonial->photo = MediaHelper::uploadCompanyFile(
                $testimonial->company_id,
                'testimonials',
                $request->file('image')
            );
        }

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image_id) {
            MediaHelper::removeCompanyFile($testimonial->image_id);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
