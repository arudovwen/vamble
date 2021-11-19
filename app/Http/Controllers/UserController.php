<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        return $this->userService->getusers();
    }

    public function searchusers(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'LIKE', '%' . $query . '%')->paginate(15);

        return view('admin.users', compact('users'));
    }

    public function store(Request $request)
    {
        return $this->userService->createuser($request);
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(Request $request, User $user)
    {
        return $this->userService->updateuser($request);
    }

    public function destroy(User $user)
    {
        return $this->userService->removeuser($user);
    }
}
