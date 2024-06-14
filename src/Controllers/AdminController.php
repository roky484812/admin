<?php
namespace Roky\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller{
    public function index(){
        $user = User::where('is_admin', true)->get();
        if(!$user)
            return response()->json([
                'status' => false,
               'message' => 'No admin found.'
            ]);
        return response()->json([
            'status' => true,
            'data' => $user,
            'message' => 'All admin fetched successfully.'
        ]);
    }
    public function store(Request $req){
        $validated = $req->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required|min:6'
        ]);
        $validated['is_admin'] = 1;
        $validated['password'] = $validated['password'] ? bcrypt($validated['password']) :'';
        User::insert($validated);
        return response()->json([
            'status'=> true,
            'message'=> 'Successfuly created a new admin'
        ]);
    }
    public function update($id, Request $req){
        $validated = $req->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'password'=> 'nullable|min:6'
        ]);
        $update = User::where(function($query) use ($id){
            $query->where('id', $id);
            $query->where('is_admin', 1);
        })->update($validated);
        if(!$update)
            return response()->json([
                'status'=> false,
                'message'=> 'Failed to update admin'
            ]);
        return response()->json([
            'status'=> true,
            'message'=> 'Successfuly created a new admin'
        ]);
    }
}
