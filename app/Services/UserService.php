<?php

namespace App\Services;

use App\Models\User;

class UserService
{

  public function createuser($request)
  {
    return  $user = User::firstOrCreate(
      ['email' => strtolower($request->email)],
      [
        'name' => strtolower($request->name),
        'email' => strtolower($request->email),
        'phone' => $request->phone,
        'address' => strtolower($request->address),
        'gender' => strtolower($request->gender),
        'nationality' => strtolower($request->nationality),
        'role_id' => $request->role_id
      ]
    );
  }
  public function updateuser($request)
  {
    return  $user = User::updateOrCreate(
      ['email' => strtolower($request->email)],
      [
        'name' => strtolower($request->name),
        'email' => strtolower($request->email),
        'phone' => $request->phone,
        'address' => strtolower($request->address),
        'gender' => strtolower($request->gender),
        'nationality' => strtolower($request->nationality),
        'role_id' => $request->role_id
      ]
    );
  }

  public function getuser($id)
  {
    User::find($id);
  }

  public function getusers()
  {
    return  User::where('role_id', 3)->get();
  }

  public function removeuser($user)
  {
    $user->delete();
    return response()->json('deleted');
  }
}
