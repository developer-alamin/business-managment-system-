<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::query();
        $doctors = $doctors->latest()->paginate(10);
        return view("Backend.Doctors.Index",compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.Doctors.Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Doctor::validationRules(),Doctor::RulesMsg());
        $name = $request->name;
        $nameResize = str_replace(" ","", $name);
        $http = "http://" . $_SERVER['HTTP_HOST'] . "/";

        //For Photo Upload
        if ($request->file("photo")) {
            $img = $request->file("photo");
            $imgPathName = $img->getClientOriginalName();
            $ExplodeImg = explode(".", $imgPathName);
            $endImg = end($ExplodeImg);
            $RandomPath = $nameResize.'Img'. rand(5,150) . "." . $endImg;
            $uploadPhoto = $http . "Doctors/" . $RandomPath;
            $img->move(public_path("Doctors/"), $RandomPath);

        }else{
            $uploadPhoto = null;
        }

        Doctor::create([
            'name' => $name,
            'email' => $request->email,
            'phone' => $request->phone,
            'photo' => $uploadPhoto,
            'address' => $request->address
        ]);
        return redirect()->back()->with('success',"Doctor Created Success");

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
    public function edit(Doctor $doctor)
    {
        return view("Backend.Doctors.Edit",compact('doctor'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate(
    [
                'email'        => 'unique:doctors,email,'.$doctor->id,
                'phone'        => 'unique:doctors,phone,'.$doctor->id,
                'photo'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            ],
    [
                'email.unique' => "Your Email Already Exits",
                'phone.unique' => "Your Phone Already Exits",
                'photo.image' => "Please Image Select",
                'photo.mimes' => "Please Image Type",
            ]);
           
        $name = $request->name;
        $http = "http://" . $_SERVER['HTTP_HOST'] . "/";
        $nameResize = str_replace(" ","", $name);

        // Doctor Image Updated
        if ($request->file("photo")) {
            $img = $request->file(key: "photo");
            $imgPathName = $img->getClientOriginalName();
            $ExplodeImg = explode(".", $imgPathName);
            $endImg = end($ExplodeImg);
            $RandomPath = $nameResize.'Img'. rand(5,150) . "." . $endImg;
            $uploadPhoto = $http . "Doctors/" . $RandomPath;
            $img->move(public_path("Doctors/"), $RandomPath);

            // old image delete system
            $oldImg = $doctor->photo;
            $explodeOldImg = explode("/", $oldImg);
            $endOldImg = end($explodeOldImg);
            $deletePublicPath = public_path("Doctors/".$endOldImg);
            if(File::exists($deletePublicPath)){
                File::delete($deletePublicPath);
            }
        }else{
            $uploadPhoto = $doctor->photo;
        }

        $doctor->name = $name;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->photo = $uploadPhoto;
        $doctor->address = $request->address;
        $doctor->update();
        return redirect()->back()->with("update","Doctor Update Success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        if($doctor){
           //Doctor image check and delete
            if($doctor->photo) {
                $img = $doctor->photo;
                $explodeImg = explode("/", $img);
                $EndImg = end($explodeImg);
                $deletePath = public_path("Doctors/" .$EndImg);
                if (File::exists($deletePath)) {
                    File::delete($deletePath);
                }
            }
        
            $doctor->delete();
            return redirect()->back()->with('deleted',"Doctor Data Deleted");
        }
    }

  
}
