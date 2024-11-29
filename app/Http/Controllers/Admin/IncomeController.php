<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Income;
use App\Models\Payment_Method;
use App\Models\Products;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes = Income::query();
        $incomes = $incomes->latest()->with('product','method')->paginate(10);

        //dd($incomes->toArray());
        return view("Backend.Income.Index",compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

        $income_types = Attributes::where("category",'income')->where("type",'type')
        ->with("values")
        ->first();

        $seles_types = Attributes::where("category",'product')->where("type",'type')
        ->with("values")
        ->first();

        $products = Products::latest()->get();
        $payments = Payment_Method::latest()->get();
        //dd($product_types);
        return view("Backend.Income.Create",compact('seles_types','income_types','payments','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

        Income::create([
            'income_type' => $request->income_type,
            'seles_type' => $request->seles_type,
            'product_id' => $request->product,
            'payment_method_id' => $request->payment_method,
            'payment_info' => $request->info,
            'amount' => $request->amount,
            'date' => $request->date,
            'description' => $request->description
        ]);
        Session::flash('success','Income Created Success');
        return redirect()->back();

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
    public function edit(Income $income)
    {
        $income_types = Attributes::where("category",'income')->where("type",'type')
        ->with("values")
        ->first();

        $seles_types = Attributes::where("category",'product')->where("type",'type')
        ->with("values")
        ->first();

        $products = Products::latest()->get();
        $payments = Payment_Method::latest()->get();

        return view("Backend.Income.Edit",compact('income','seles_types','income_types','payments','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Income $income)
    {
        $date = ($request->date) ? $request->date : $income->date;

        $income->income_type = $request->income_type;
        $income->seles_type = $request->seles_type;
        $income->product_id = $request->product;
        $income->payment_method_id = $request->payment_method;
        $income->payment_info = $request->info;
        $income->amount = $request->amount;
        $income->date = $date;
        $income->description = $request->description;
        $income->update();
        return redirect()->back()->with('update','Income Updated Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        if($income){
            $income->delete();
            return redirect()->back()->with('success','Income Data Deleted');
        }
    }
}
