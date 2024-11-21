<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::latest()->with('parent')->paginate(10);
       //dd($products->toArray());
        return view('Backend.Products.Index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$parents = Products::select('id','product_id')->latest()->get();
        $parents = Products::latest()->select('id','product_id')->get();
       // dd($parents->toArray());
        return view('Backend.Products.Create',compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Products::create([
            'product_id' => $request->product_id,
            'product_type' => $request->type,
            'gender' => $request->gender,
            'parent_id' => $request->parent,
            'note' => $request->note,
            'status' => $request->status,
            'date' => $request->date
        ]);
        return redirect()->back()->with('success','Product Created Success');
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
    public function edit(Products $product)
    {
        $parents = Products::latest()->select('id','product_id')->get();
        return view("Backend.Products.Edit",compact('product','parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product)
    {
        $request->validate([
            'product_id' => 'unique:products,product_id,'.$product->id
        ],[
           'product_id.unique' => "This Id Already Exits"
        ]);

        $date = ($request->date ) ? $request->date:$product->date;

       $product->product_id = $request->product_id;
       $product->product_type = $request->type;
       $product->gender = $request->gender;
       $product->parent_id = $request->parent;
       $product->note = $request->note;
       $product->status = $request->status;
       $product->date = $date;
       $product->update();

       return redirect()->back()->with('update','Product Updated Success');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        if ($product) {
            $product->delete();
            return redirect()->back()->with('success','Product Deleted Success');
        }
    }
}
