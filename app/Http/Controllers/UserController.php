<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function createUser(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        return response()->json($user);
    }

    public function index(Request $request)
    {
        $users = User::all();

        return UserResource::collection($users);
    }

    public function showUserList(Request $request)
    {
        return view('user.list', ['users' => User::all()]);
    }

    public function editUser(Request $request, User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    public function updateUser(UpdateUserRequest $request, User $user)
    {

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('user.list');
    }
}
