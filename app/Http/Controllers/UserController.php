<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\ExportUser;
use Illuminate\Http\Request;
use App\Services\UserService;
use Maatwebsite\Excel\Facades\Excel;

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



    // public function import(Request $request)
    // {
    //     Excel::import(new ImportUser, $request->file('file')->store('files'));
    //     return redirect()->back();
    // }

    public function exportUsers(Request $request)
    {

        return  Excel::download(new ExportUser, 'users.csv');
    }


    public function marknotification($id)
    {

        $userUnreadNotification = auth()->user()
            ->unreadNotifications
            ->where('id', $id)
            ->first();

        if ($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
        }
        return back();
    }
}
