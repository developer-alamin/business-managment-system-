<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct() {
        $this->middleware('permission:role list', ['only' => ['index','show']]);
        $this->middleware('permission:role create', ['only' => ['create','store']]);
        $this->middleware('permission:role edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with("permissions")->latest()->get();

        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::with('roles')->latest()->get();
        //dd($permissions->toArray());
        return view('Roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $role = Role::create(['name'=>$request->name,'guard_name'=>'web']);
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')->with('status','Role Create Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::with('permissions')->findOrFail(id: $id);
        $id = $role->permissions()->pluck('id')->toArray();

        $permissions = Permission::with('roles')->latest()->get();

        return view('Roles.edit',compact('role','permissions','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->toArray());
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $role->syncPermissions($permissions);
        $role->update();
        return redirect()->route('roles.index')->with('update','updated success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if(!is_null($role)){
            $role->delete();
            return redirect()->route('roles.index')->with('delete','success');
        }
    }
}
