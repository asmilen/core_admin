<?php

namespace App\Http\Controllers\Admin;

use Sentinel;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role;

        return view('admin.roles.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|max:255',
        ], [
            'name.required' => "Vui lòng nhập tên.",
            'name.max' => "Tên của bạn quá dài, tối đa 255 kí tự.",
        ]);

        Sentinel::getRoleRepository()->createModel()->create(request()->all());

        flash()->success('Success!', 'Role successfully created.');

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate(request(), [
            'name' => 'required|max:255',
        ], [
            'name.required' => "Vui lòng nhập tên.",
            'name.max' => "Tên của bạn quá dài, tối đa 255 kí tự.",
        ]);


        $role->update(request()->all());

        flash()->success('Success!', 'Role successfully updated.');

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        flash()->success('Success!', 'Role successfully deleted.');
    }

    public function getDatatables()
    {
        return Role::getDatatables();
    }
}
