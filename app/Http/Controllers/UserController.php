<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user);
    }

    public function index(Request $request){
        $users = User::all();
        return UserResource::collection($users);
    }
}
