<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserProfile()
    {
        $user = auth()->user();
        $user = new UserResource($user);
        return $this->successResponse($user, 'User profile', 200);
    }
    public function assignUserRole(Request $request)
    {
        $userIds = $request->userIds;
        $role = $request->role;
        $users = User::whereIn('id', $userIds)->get();
        foreach ($users as $user) {
            $user->syncRoles([$role]);
        }
        return $this->successResponse([], 'All Users role have been assigned', 200);
    }
    public function deleteUsers(Request $request)
    {
        $userIds = $request->userIds;
        User::whereIn('id', $userIds)->delete();
        return $this->successResponse([], 'All selected users have been deleted', 200);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get()->map(function ($user) {
            return new UserResource($user);
        });
        return $this->successResponse($users, '', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
