<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        return response()->json($user);
    }

    public function index(Request $request){
        $users = User::all();
        return UserResource::collection($users);
    }
}
