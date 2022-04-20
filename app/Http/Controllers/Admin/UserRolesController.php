<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRolesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::latest()->paginate();
        return view('admin.user-roles.index', compact('users'));
    }

    // Assigns users roles
    public function assignRoles(Request $request)
    {
        try {
            $user = User::where('email', $request['email'])->firstOrFail();

            $user->roles()->detach();

            if ($request['role_user']) {
                $user->roles()->attach(Role::where('name', 'User')->first());
            }
            if ($request['role_admin']) {
                $user->roles()->attach(Role::where('name', 'Admin')->first());
            }

            return redirect()->back()->with('flash_message', "User Roles assigned!");
        } catch (ModelNotFoundException $e) {
            Log::error('Could not assign user roles. User NOT FOUND! ' . $e);
            return redirect()->back()->with('flash_message_error', "Could not assign roles. User NOT FOUND!");
        }
    }
}
