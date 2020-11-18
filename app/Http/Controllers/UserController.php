<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getUserSpesifik($id)
    {
        $user = User::with('role')->find($id);
        return response()->json($user);
    }

    public function validation(array $data, $field)
    {
        return Validator::make($data, $field);
    }

    public function editUser(Request $request, $id)
    {
        $user = User::find($id);
        if ($user->email == $request->email) {
            $this->validation(array('name' => $request->name), [
                'name' => ['required', 'string', 'max:255'],
            ])->validate();
        } else {
            $this->validation($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            ])->validate();
        }
        $role = Role::where('nama_role', '=', $request->role)->first();
        $user->nama_lengkap = $request->name;
        $user->email = $request->email;
        $user->role_id = $role->id_role;
        $user->save();
        return response()->json([
            'status' => 'success',
            'code' => 200,
        ]);
    }

    public function ubahPassword(Request $request, $id)
    {
        $this->validationPassword($request->all())->validate();
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'status' => 'success',
            'code' => 200,
        ]);
    }

    public function hapusUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'status' => 'success',
            'code' => 200,
        ]);
    }

    public function validationPassword(array $data)
    {
        return Validator::make($data, [
            'password' => ['required', 'string', 'confirmed', 'min:8'],
        ]);
    }
}
