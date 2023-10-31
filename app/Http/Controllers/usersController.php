<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class usersController extends Controller
{
    public function index()
    {
        $users = users::all();
        return response()->json([
            "success" => true,
            "message" => "Get all users is successfully",
            "data" => $users
        ]);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "name" => "required|string",
            "email" => "required|email",
            "password" => "required|string",
        ]);
        if ($validation->fails()) {
            return response()->json([
                "success" => false,
                "message" => "Create user is failed",
                "data" => $validation->errors()
            ]);
        }

        $users = new users;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->phone = $request->phone;
        $users->gender = $request->gender;
        $users->role = $request->role;
        $users->dateOfBirth = $request->dateOfBirth;
        $users->save();
        return response()->json([
            "success" => true,
            "message" => "Create user is successfully",
            "data" => $users
        ]);
    }

    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required|string",
        ]);
        if ($validation->fails()) {
            return response()->json([
                "success" => false,
                "message" => "Login is failed",
                "data" => $validation->errors()
            ]);
        }

        $users = users::where("email", $request->email)->first();
        if (! $users || ! Hash::check($request->password, $users->password)) {
            return response()->json([
                "success" => false,
                "message" => "Login is failed",
                "data" => "Email or password is wrong"
            ]);
        }
        return response()->json([
            "success" => true,
            "message" => "Login is successfully",
            "data" => $users
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        if (! ! $request->password || ! ! $request->email) {
            return response()->json([
                "success" => false,
                "message" => "Update user is failed",
                "data" => "Email and password can not be updated"
            ]);
        }
        if (! $id) {
            return response()->json([
                "success" => false,
                "message" => "Update user is failed",
                "data" => "Id is required"
            ]);
        }
        $users = users::find($id);
        if (! $users) {
            return response()->json([
                "success" => false,
                "message" => "Update user is failed",
                "data" => "User is not found"
            ]);
        }
        $users->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "Update user is successfully",
            "data" => $users
        ]);
    }

    public function deleteUser($id)
    {
        if (! $id) {
            return response()->json([
                "success" => false,
                "message" => "Delete user is failed",
                "data" => "Id is required"
            ]);
        }
        $users = users::find($id);
        if (! $users) {
            return response()->json([
                "success" => false,
                "message" => "Delete user is failed",
                "data" => "User is not found"
            ]);
        }
        $users->delete();
        return response()->json([
            "success" => true,
            "message" => "Delete user is successfully",
            "data" => $users
        ]);
    }
}
