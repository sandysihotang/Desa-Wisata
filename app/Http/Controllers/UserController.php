<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function kelolaUser()
    {
        $user = User::all()->where("isDeleted", 0);
        return view('admin.kelola-user', compact('user'));
    }

    public function tambahUser()
    {
        $role = Auth::user()->role_id;

        return view('admin.tambah-user', compact('role'));
    }

    public function getUserLogin()
    {
        $userLogin = Auth::user()->id_user;
        $user = User::find($userLogin);
        return response()->json($user);
    }

    public function getUserSpesifik($id)
    {
        $user = User::with('role')->find($id);
        return response()->json($user);
    }

    public function validation(array $data, $field)
    {
        return Validator::make($data, $field);
    }

    public function editProfile(Request $request)
    {
        $user = User::find(Auth::user()->id_user);
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
        if($request->username != $user->username) {
            $this->validation(array('username' => $request->username), [
                'username' => ['required', 'string', 'max:255', 'unique:user'],
            ])->validate();
            $user->username = $request->username;
        }
        $user->nama_lengkap = $request->name;
        $user->email = $request->email;
        $user->save();
        return response()->json([
            'status' => 'success',
            'code' => 200,
        ]);
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
        if (Role::find(Auth::user()->role_id)->nama_role == 'super_admin') {
            $role = Role::where('nama_role', '=', $request->role)->first();
            $user->role_id = $role->id_role;
        }
        if($request->username != $user->username) {
            $this->validation(array('username' => $request->username), [
                'username' => ['required', 'string', 'max:255', 'unique:user'],
            ])->validate();
            $user->username = $request->username;
        }
        $user->nama_lengkap = $request->name;
        $user->email = $request->email;
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

    public function ubahPasswordProfile(Request $request)
    {
        $this->validationPassword($request->all())->validate();
        $user = User::find(Auth::user()->id_user);
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'status' => 'success',
            'code' => 200,
        ]);
    }

    public function hapusUser($id)
    {
        $role = Role::find(User::find($id)->role_id)->nama_role;
        if (Role::find(Auth::user()->role_id)->nama_role == 'admin' && ($role == 'admin' || $role == 'super_admin')) {
            return redirect('/kelola-user');
        }
        $user = User::find($id);
        $user->isDeleted = 1;
        $user->save();
        return redirect('/kelola-user');
    }

    public function validationPassword(array $data)
    {
        return Validator::make($data, [
            'password' => ['required', 'string', 'confirmed', 'min:8'],
        ]);
    }

    public function setAktif($id)
    {
        $user = User::find($id);
        $user->isActive = 1;
        $user->save();

        return redirect('/kelola-user');
    }

    public function setNonaktif($id)
    {
        $user = User::find($id);
        $user->isActive = 0;
        $user->save();

        return redirect('/kelola-user');
    }
}
