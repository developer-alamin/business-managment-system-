<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct() {
        //$this->middleware('permission:users list', ['only' => ['index','show']]);
        //$this->middleware('permission:users create', ['only' => ['create','store']]);
        //$this->middleware('permission:users edit', ['only' => ['edit','update']]);
        //$this->middleware('permission:users delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::with(relations: 'permissions')->latest()->get();
        return view("Users.create",compact('roles'));
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with('roles')->findOrFail($id);
        $hasRoles = $user->roles()->pluck('id');

        $roles = Role::with(relations: 'permissions')->latest()->get();
       // dd($roles->toArray());
        return view('users.edit',compact(
            'user','hasRoles','roles'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $role = Role::findOrFail($request->role);
        $user->syncRoles($role);
        $user->update();
       return redirect()->route('users.index')->with('update','updated success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function roleBassedPermission(Request $request){

        $roleBassedPermission = Role::with("permissions")->findOrFail($request->id);
        return response()->json($roleBassedPermission, 200,);
    }
}
