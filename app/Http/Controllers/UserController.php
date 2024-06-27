<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordValidationRequest;
use App\Http\Requests\UserUpdateValidationRequest;

class UserController extends Controller
{
    public function profile()
    {
        return view('app.users.profile', [
            'user' => auth()->user(),
        ]);
    }

    public function profileUpdate(UserUpdateValidationRequest $request, $id)
    {
        $user = User::findOrfail($id);

        $user->update($request->only(['name', 'email']));

        return redirect()->route('user.profile');
    }

    public function password()
    {
        return view('app.users.password', [
            'user' => auth()->user(),
        ]);
    }

    public function passwordUpdate(PasswordValidationRequest $request, $id)
    {
        $user = User::findOrFail($id);

        User::whereId($user->id)
            ->update([
                'password' => Hash::make($request->new_password),
            ]);

        return redirect()->route('dashboard');
    }

}
