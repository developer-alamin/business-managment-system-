<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\Models\Products;
use App\Models\Investment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $investments = Investment::query();
        $investments = $investments->latest()->with('product','member')->paginate(10);
       //dd($investments->toArray());
        return view("Backend.Investment.Index",compact('investments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Products::latest()->get();
        $members = Member::latest()->get();
        return view("Backend.Investment.Create",compact('products','members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Investment::create([
            'member_id' => $request->member,
            'product_id' => $request->product,
            'investment_qty' => $request->quantity,
            'note' => $request->note,
            'date' => $request->date
        ]);
        return redirect()->back()->with('success','Investment Created Success');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Investment $investment)
    {
        return view("Backend.Investment.Edit",compact('investment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investment $investment)
    {
        $date = ($request->date) ? $request->date : $investment->date;
        $investment->date = $date;
        $investment->investment_qty = $request->quantity;
        $investment->note = $request->note;
        $investment->update();
        return redirect()->back()->with('update',value: 'Investment Data Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investment $investment)
    {
        if ($investment) {
            $investment->delete();
            return redirect()->route('investment.index')->with('success','Investment Deleted Success');
        }
    }


    public function productSelect(Request $request){

        if ($request->id) {
            $product = Products::findOrFail($request->id);
            return response()->json($product, 200,);

        }
    }
    public function memberselect(Request $request){

        if ($request->id) {
            $member = Member::findOrFail($request->id);
            return response()->json($member, 200,);

        }
    }
}
