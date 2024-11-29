<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute_Value;
use App\Models\Attributes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attributes = Attributes::query();
        $attributes = $attributes->latest()->paginate(10);
        return view("Backend.Attribute.Index",compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.Attribute.Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all());


    $request->validate(Attributes::rules(),Attributes::msg());
    $slug = str_replace(' ','-',strtolower($request->category. ' '.$request->type.' '.$request->slug));
    //dd($slug );


    Attributes::create([
        'category' => $request->category,
        'type' => $request->type,
        'slug' => $slug,
        'status' => $request->status
       ]);
       return redirect()->back()->with('success','Attribute Created Success');

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
    public function edit(Attributes $attribute)
    {
        if($attribute){
            return view("Backend.Attribute.Edit",compact('attribute'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attributes $attribute)
    {
        $request->validate(
            [
                'slug'        => 'unique:attributes,slug,'.$attribute->id,
            ],
            [
                'slug.unique' => 'This Slug Already Exits',
            ]
        );

        $customize = str_replace(' ','-',strtolower($request->slug));
        $slug = ($request->slug) ? $customize : $attribute->slug;
        
        $attribute->category = $request->category;
        $attribute->type = $request->type;
        $attribute->slug = $slug;
        $attribute->status = $request->status;
        $attribute->update();
        return redirect()->back()->with('update','Attribute Updated Success');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attributes $attribute)
    {
        if ($attribute) {
            $attribute->delete();
            return redirect()->back()->with('success',"Attibute Data Deleted");
        }
        

    }

    public function attributesgetvalues(String $slug)  {

        $attribute = Attributes::where('slug',$slug)->with('values')->firstOrFail();
      // dd($attribute->toArray());
        return view("Backend.Attribute.Value",compact('attribute'));
    }
    public function attributesvaluestore(Request $request){
        //dd($request->all());
        Attribute_Value::create([
            'value' => $request->value,
            'attribute_id' => $request->attribute_id,
            'status' => $request->status
        ]);
        return redirect()->back()->with('success',"Attibute Value Addedd");
    }

    public function attributesvalueedit(Request $request,$slug,$id){
        $value = Attribute_Value::with('attribute')->findOrFail($id);
        //dd($value->toArray());
        return view("Backend.Attribute.Value_Edit",compact('value'));
    }

    public function attributesvalueupdate(Request $request,$slug,$id){

        $request->validate(
            [
                'value'        => 'unique:attribute_values,value,'.$id,
            ],
            [
                'value.unique' => "This Value Already Exits",
            ]
        );


        $value = Attribute_Value::with('attribute')->findOrFail($id);
        
        $value->value = $request->value;
        $value->status = $request->status;
        $value->update();
        return redirect()->back()->with('update','Value Updated Success');
    }
}
