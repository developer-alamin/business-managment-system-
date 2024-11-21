<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceTypes = ServiceType::query();
        $serviceTypes =  $serviceTypes->latest()->paginate(10);
        return view("Backend.Service_Type.Index",compact('serviceTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Service_Type.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ServiceType::create([
            'name' => $request->name,
            'status' => $request->status
        ]);
        return redirect()->back()->with('success',"Service Type Created Success");

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
        $serviceType = ServiceType::findOrFail($id);
;
        return view('Backend.Service_Type.Edit',compact('serviceType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $serviceType = ServiceType::findOrFail($id);

        $serviceType->name = $request->name;
        $serviceType->status = $request->status;
        $serviceType->update();
        return redirect()->back()->with('update',"Service Type Updated Success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
        $serviceType = ServiceType::findOrFail($id);
        if ($serviceType) {
            $serviceType->delete();
            return redirect()->back()->with('success','Service Type Data Deleted');

        }
    }
}
