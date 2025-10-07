<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MediaHelper;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User; // Doctors
use Illuminate\Http\Request;
use DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('backend.account-settings.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'phone'    => 'nullable|string|max:20',
            'password' => 'nullable|min:6|confirmed',
            'image'    => 'nullable|image|max:2048',
        ]);


        if ($request->hasFile('image')) {
            if ($user->image) {
                MediaHelper::removeCompanyFile($user->image);
            }

            $photoId = MediaHelper::uploadCompanyFile(1,'profile',$request->file('image'));
            $validated['image'] = $photoId;
        }


        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return back()->with('success', 'Account updated successfully.');
    }
}
