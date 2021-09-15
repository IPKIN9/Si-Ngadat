<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'all' => User::where('role', 'admin')->get(),
        );
        return view('Auth/User')->with('data', $data);
    }

    public function create(UserRequest $request)
    {
        $date = Carbon::now();
        $data = array(
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'created_at' => $date,
            'updated_at' => $date,
        );
        $admin = User::create($data);
        $admin->assignRole($request->role);
        return redirect()->back()->with('status', 'Data berhasil Tersimpan');
    }

    public function edit($id)
    {
        $result = User::where('id', $id)->first();
        return response()->json($result);
    }
    public function update(UserRequest $request)
    {
        $id = $request->id;
        $date = Carbon::now();
        $data = array(
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'updated_at' => $date,
        );
        User::where('id', $id)->update($data);
        return redirect()->back()->with('status', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return response()->json();
    }
}
