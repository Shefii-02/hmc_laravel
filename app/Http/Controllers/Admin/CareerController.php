<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::latest()->paginate(10);
        return view('backend.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('backend.careers.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Career::create($request->all());

        return redirect()->route('admin.career.index')
            ->with('success', 'Career added successfully!');
    }

    public function edit(Career $career)
    {
        return view('backend.careers.form', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $career->update($request->all());

        return redirect()->route('admin.career.index')
            ->with('success', 'Career updated successfully!');
    }

    public function destroy(Career $career)
    {
        $career->delete();

        return redirect()->route('admin.career.index')
            ->with('success', 'Career deleted successfully!');
    }
}
