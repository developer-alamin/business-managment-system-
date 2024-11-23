<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment_Method;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $methods = Payment_Method::query();
        $methods =  $methods->latest()->paginate(10);
        return view("Backend.Payment Method.Index",compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Backend.Payment Method.Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'type' => 'unique:payment_methods,account_type'
            ],
            [
                'type.unique' => "This Account Already Exits"
            ]
        );
        Payment_Method::create([
            'account_type' => $request->type, 
            'account_name' => $request->name, 
            'account_number' => $request->number, 
            'account_branch' => $request->branch, 
            'opening_amount' => $request->amount,
            'note' => $request->note,
            'status' => $request->status,
            'date' => $request->date
        ]);
        return redirect()->back()->with('success','Payment Method Created Success');    
    

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
        $method = Payment_Method::findOrFail($id);
        if ($method) {
            return view("Backend.Payment Method.Edit",compact('method'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $method = Payment_Method::findOrFail($id);
        if ($method) {
            $request->validate(
                ['type' => 'unique:payment_methods,account_type,'.$method->id],
                ['type.unique' => "This Account Already Exits"]
            );
            $date = ($request->date) ? $request->date:$method->date;
            $method->account_type = $request->type;
            $method->account_name = $request->name;
            $method->account_number = $request->number;
            $method->account_branch = $request->branch;
            $method->opening_amount = $request->amount;
            $method->note = $request->note;
            $method->status = $request->status;
            $method->date = $date;
            $method->update();
            return redirect()->back()->with('update',"Payment Method Updated Success");


        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
