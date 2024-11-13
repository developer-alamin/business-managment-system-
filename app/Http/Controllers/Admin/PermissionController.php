<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct() {
       // $this->middleware('permission:permission list', ['only' => ['index','show']]);
        //$this->middleware('permission:permission create', ['only' => ['create','store']]);
        //$this->middleware('permission:permission edit', ['only' => ['edit','update']]);
        //$this->middleware('permission:permission delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'unique:permissions'
        ],[
            'name.unique' => "Permission Name Already Exits"
        ]);

        Permission::create(['name' => $request->name]);
        return redirect()->back()->with('success','Permission Create Success');
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
        $permission = Permission::findOrFail($id);
        return view('permissions.edit',compact('permission'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $permission = Permission::findOrFail($id);

        $request->validate([
            'name' => 'unique:permissions'
        ],[
            'name.unique' => "Permission Name Already Exits"
        ]);

        $permission->name = $request->name;
        $permission->update();
        return redirect()->back()->with('update','Permission Update Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {

        if(!is_null($permission)){
           $permission->delete();
           return redirect()->route('permission.index')->with('success','Permission Deleted Success');
        }

    }
}
