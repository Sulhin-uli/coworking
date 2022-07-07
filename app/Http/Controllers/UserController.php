<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function save(Request $request)
    {
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $data->assignRole($request->role);
    }

    public function list_data()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('user.list_data')->with([
            'users' => $users
        ]);
    }

    public function hapus($id)
    {
        $data = User::findOrfail($id);
        $data->delete();
    }

    public function edit($id)
    {
        $data = User::where('id', $id)->first();
        $data->role =  $data->getRoleNames()->first();
        return $data;
    }

    public function submit_edit(Request $request, $id)
    {
        $data = User::findOrfail($id);
        $success = '';
        $checkEmail = User::where('email', '=', $request->email)->first();

        if ($checkEmail != "") {
            if ($request->email != $data->email) {
                $success = 'fail email';
            } else {
                $success = 'success';
            }
    } 
        
        if (!Hash::check($request->password, $data->password)) {
            $success = 'fail password';
        } 
        
        if ($success == 'success') {
            $data->name = $request->name;
            if ($request->email != $data->email) {
                $data->email = $request->email;
            }
            $data->password = Hash::make($request->password);
            $data->save();
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $data->assignRole($request->role);

            return $success;    
        } else {
            // return $success;
        }
    }
}
