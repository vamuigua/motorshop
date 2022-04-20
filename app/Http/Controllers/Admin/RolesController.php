<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class RolesController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $roles = Role::latest()->paginate();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $latest_role = new Role();
        $requestData = $this->validateData($request);

        try {
            $role = Role::create($requestData);
            $latest_role = $role;

            return redirect('admin/roles/' . $latest_role->id)->with('flash_message', 'Role added!');
        } catch (\Throwable $th) {
            Role::destroy($latest_role->id);

            Log::error('Error! Unable to create role: ' . $th->getMessage());

            return redirect('admin/roles')->with('flash_message_error', 'Error while creating role');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $requestData = $this->validateData($request);

        $role = Role::findOrFail($id);

        try {
            $role->update($requestData);
            return redirect('admin/roles/' . $role->id)->with('flash_message', 'Role updated!');
        } catch (\Throwable $th) {
            Log::error('Error! Unable to update role: ' . $th->getMessage());
            return redirect('admin/roles')->with('flash_message_error', 'Error while updating role');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            Role::destroy($id);
            return redirect('admin/roles')->with('flash_message', 'Role deleted!');
        } catch (\Throwable $th) {
            Log::error('Error! Unable to delete role: ' . $th->getMessage());
            return redirect('admin/roles')->with('flash_message_error', 'Error while deleting role');
        }
    }

    public function validateData(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
    }
}
