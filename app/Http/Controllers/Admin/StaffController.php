<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = User::where('account_type', 'staff')->latest()->paginate(10);
        return view('admin.staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'nullable|string|max:20',
            'password' => 'required|min:6|confirmed',
            'image'    => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('staff', 'public');
        }

        $validated['password'] = Hash::make($validated['password']);
        $validated['account_type'] = 'staff';

        User::create($validated);

        return redirect()->route('admin.staff.index')->with('success', 'Staff created successfully');
    }

    public function edit(User $staff)
    {
        return view('admin.staff.edit', compact('staff'));
    }

    public function update(Request $request, User $staff)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $staff->id,
            'phone'    => 'nullable|string|max:20',
            'password' => 'nullable|min:6|confirmed',
            'image'    => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($staff->image) Storage::disk('public')->delete($staff->image);
            $validated['image'] = $request->file('image')->store('staff', 'public');
        }

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $staff->update($validated);

        return redirect()->route('admin.staff.index')->with('success', 'Staff updated successfully');
    }

    public function destroy(User $staff)
    {
        if ($staff->image) Storage::disk('public')->delete($staff->image);
        $staff->delete();

        return back()->with('success', 'Staff deleted successfully');
    }
}
