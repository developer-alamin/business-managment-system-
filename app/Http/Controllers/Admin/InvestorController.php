<?php

namespace App\Http\Controllers\Admin;

use App\Models\Investor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $investors = Investor::query();
        $investors = $investors->paginate(10);
        return view("Backend.Investor.Index",compact('investors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.Investor.Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(Investor::validationRules(),Investor::RulesMsg());

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
            $uploadPhoto = $http . "Investors/" . $RandomPath;
            $img->move(public_path("Investors/"), $RandomPath);

        }else{
            $uploadPhoto = null;
        }
        //For Pdf Upload
        if ($request->file("attachment")) {
            $img = $request->file("attachment");
            $imgPathName = $img->getClientOriginalName();
            $ExplodeImg = explode(".", $imgPathName);
            $endImg = end($ExplodeImg);
            $RandomPath = $nameResize.'Pdf'. rand(5,150) . "." . $endImg;
            $uploadPdf = $http . "Investors/" . $RandomPath;
            $img->move(public_path("Investors/"), $RandomPath);
        }else{
            $uploadPdf = null;
        }

        Investor::create([
            'name' => $name,
            'email' => $request->email,
            'phone' => $request->phone,
            'alt_phone' => $request->alt_phone,
            'photo' => $uploadPhoto,
            'address' => $request->address,
            'attachments' => $uploadPdf
        ]);

        return redirect()->back()->with('success',"Investor Created Success");


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
    public function edit(Investor $investor)
    {
        return view("Backend.Investor.Edit",compact('investor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investor $investor)
    {
        $request->validate(
 [
            'name'         => 'required',
            'email'        => 'required|email|unique:investors,email,'.$investor->id,
            'phone'        => 'required',
            'alt_phone'    => 'nullable',
            'photo'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'attachment'   => 'nullable|mimes:pdf|max:10240', // PDF validation (10MB max)
            'address'      => 'nullable'
        ],
  [
            'name.required' => "Please Enter Name",
            'email.required' => "Please Enter Email",
            'email.email' => "Please Email",
            'email.unique' => "Your Email Already Exits",
            'photo.image' => "Please Image Select",
            'photo.mimes' => "Please Image Type",
            'attachment.mimes' => "Please Pdf Select"
        ]);

        $name = $request->name;
        $http = "http://" . $_SERVER['HTTP_HOST'] . "/";
        $nameResize = str_replace(" ","", $name);

        // Investor Image Updated
        if ($request->file("photo")) {
            $img = $request->file(key: "photo");
            $imgPathName = $img->getClientOriginalName();
            $ExplodeImg = explode(".", $imgPathName);
            $endImg = end($ExplodeImg);
            $RandomPath = $nameResize.'Img'. rand(5,150) . "." . $endImg;
            $uploadPhoto = $http . "Investors/" . $RandomPath;
            $img->move(public_path("Investors/"), $RandomPath);

            // old image delete system
             $oldImg = $investor->photo;
             $explodeOldImg = explode("/", $oldImg);
             $endOldImg = end($explodeOldImg);
             $deletePublicPath = public_path("Investors/".$endOldImg);
             if(File::exists($deletePublicPath)){
                File::delete($deletePublicPath);
             }
        }else{
            $uploadPhoto = $investor->photo;
        }
         // Investor Pdf Updated
        if ($request->file("attachment")) {
            $img = $request->file(key: "attachment");
            $imgPathName = $img->getClientOriginalName();
            $ExplodeImg = explode(".", $imgPathName);
            $endImg = end($ExplodeImg);
            $RandomPath = $nameResize.'Pdf'. rand(5,150) . "." . $endImg;
            $uploadPdf = $http . "Investors/" . $RandomPath;
            $img->move(public_path("Investors/"), $RandomPath);

            // old image delete system
             $oldImg = $investor->attachments;
             $explodeOldImg = explode("/", $oldImg);
             $endOldImg = end($explodeOldImg);
             $deletePublicPath = public_path("Investors/".$endOldImg);
             if(File::exists($deletePublicPath)){

                File::delete($deletePublicPath);
             }
        }else{
            $uploadPdf = $investor->attachments;
        }
        $investor->name = $name;
        $investor->email = $request->email;
        $investor->phone = $request->phone;
        $investor->alt_phone = $request->alt_phone;
        $investor->photo = $uploadPhoto;
        $investor->address = $request->address;
        $investor->attachments = $uploadPdf;
        $investor->update();
        return redirect()->back()->with("update","Investor Update Success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investor $investor)
    {
        if($investor){
            // //rent image check and delete
            if($investor->photo) {
                $img = $investor->photo;
                $explodeImg = explode("/", $img);
                $EndImg = end($explodeImg);
                $deletePath = public_path("Investors/" .$EndImg);
                if (File::exists($deletePath)) {
                    File::delete($deletePath);
                }
            }
            if($investor->attachments) {
                $img = $investor->attachments;
                $explodeImg = explode("/", $img);
                $EndImg = end($explodeImg);
                $deletePath = public_path("Investors/" .$EndImg);
                if (File::exists($deletePath)) {
                    File::delete($deletePath);
                }
            }

            $investor->delete();
            return redirect()->back()->with('deleted',"Investor Data Deleted");
        }

    }
}
