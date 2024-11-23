<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Payment_Method;
use App\Models\Products;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::query();
        $expenses = $expenses->with('product','method')->latest()->paginate(10);
         //dd( $expences->toArray());
        return view("Backend.Expense.Index",compact(var_name: 'expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Products::latest()->get();
        $methods = Payment_Method::latest()->get();
        return view("Backend.Expense.Create",compact('products','methods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        Expense::create([
            'expense_type' => $request->type,
            'purchase_type' => $request->purchase_type,
            'product_id' => $request->product,
            'payment_method_id' => $request->method,
            'payment_info'=> $request->info,
            'amount' => $request->amount,
            'description' => $request->description,
            'date' => $request->date
        ]);
        return redirect()->back()->with('success','Expence Created Success');

    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        dd($expense->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
       // dd($expense->toArray());
       $products = Products::latest()->get();
       $methods = Payment_Method::latest()->get();
        return view("Backend.Expense.Edit",compact('expense','products','methods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $date = ($request->date) ? $request->date : $expense->date;
        $expense->expense_type = $request->type;
        $expense->purchase_type = $request->purchase_type;
        $expense->product_id = $request->product;
        $expense->payment_method_id = $request->method;
        $expense->payment_info = $request->info;
        $expense->amount = $request->amount;
        $expense->description = $request->description;
        $expense->date = $date;
        $expense->update();
        return redirect()->back()->with('update','Expense Updated Success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        if ($expense) {
            $expense->delete();
            return redirect()->back()->with('success','Expense Deleted Success');

        }
    }
}
