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

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $fileName = date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('upload/adminimages'), $fileName);

            if (!is_null($user->photo) && !empty($user->photo)) {
                $filePath = "upload/adminimages/{$user->photo}";
                unlink(public_path($filePath));
            }

            $user->photo = $fileName;
        }

        $user->save();

        return redirect()->route('user.profile')
            ->with('success', 'O seu perfil foi actualizado com sucesso!');
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

        return redirect()->route('user.password')
            ->with('success', "A sua senha foi alterada com sucesso!");
    }

}
