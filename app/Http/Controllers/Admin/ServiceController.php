<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Member;
use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::query();
        $services = $services->with('doctor','serviceType','product','member','member.products')->latest()->paginate(10);
        return view('Backend.Service.Index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::latest()->get();
        $members = Member::latest()->get();
        $serviceTypes = ServiceType::latest()->get();
        return view('Backend.Service.Create',compact('doctors','members','serviceTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       Service::create([
        'doctor_id' => $request->doctor,
        'member_id' => $request->member,
        'product_id' => $request->product, 
        'service_type_id' => $request->serviceType, 
        'note' => $request->note
       ]);

        return redirect()->back()->with('success','Service Created Success');   
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        dd($service);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $doctors = Doctor::latest()->get();
        $members = Member::latest()->get();
        $serviceTypes = ServiceType::latest()->get();
        return view('Backend.Service.Edit',compact('service','doctors','members','serviceTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
    
        $service->doctor_id = $request->doctor;
        $service->member_id = $request->member;
        $service->product_id = $request->product;
        $service->service_type_id = $request->serviceType;
        $service->note = $request->note;
        $service->update();
        return redirect()->back()->with('update',"Service Updated Success");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if ($service) {
            $service->delete();
            return redirect()->back()->with('success','Service Data Deleted');

        }
    }
    public function memberbyproduct(Request $request)  {
        $selectProduct = '';
        $memberbyproduct = Member::with('products')->findOrFail($request->id);
       return view("Backend.Service.MemberByProduct",compact('memberbyproduct','selectProduct'))->render();
    }
}
