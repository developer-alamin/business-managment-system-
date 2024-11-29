<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investor;
use App\Models\Payment_Method;
use App\Models\Attributes;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::query();
        $loans = $loans->latest()->with('investor','method')->paginate(10);

      //  dd($loans->toArray());
        return view("Backend.Loan.Index",compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $investors = Investor::latest()->get();
        $payments = Payment_Method::latest()->get();
        $loan_types = Attributes::where("category",'loan')->where("type",'type')
        ->with("values")
        ->first();
        return view("Backend.Loan.Create",compact('investors','payments','loan_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        Loan::create([
            'investor_id' => $request->investor,
            'payment_method_id' => $request->payment_method,
            'type' => $request->loan_type,
            'amount' => $request->amount,
            'date' => $request->date
        ]);
        
        return redirect()->back()->with('success','Loan Created Success');
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
    public function edit(Loan $loan)
    {
        $investors = Investor::latest()->get();
        $payments = Payment_Method::latest()->get();
        $loan_types = Attributes::where("category",'loan')->where("type",'type')
        ->with("values")
        ->first();
        return view("Backend.Loan.Edit",compact(
            'investors',
            'payments',
            'loan_types',
            'loan'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        $date = ($request->date) ? $request->date : $loan->date;
        $loan->investor_id = $request->investor;
        $loan->payment_method_id  = $request->payment_method;
        $loan->type = $request->loan_type;
        $loan->amount = $request->amount;
        $loan->date = $date;
        $loan->update();
        return redirect()->back()->with('update','Loan Updated Success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        if($loan){
            $loan->delete();
            return redirect()->back()->with('success',"Loan Deleted Success");
        }
    }
}
