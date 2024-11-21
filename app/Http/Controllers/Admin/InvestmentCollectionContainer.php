<?php

namespace App\Http\Controllers\Admin;

use App\Models\Investor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InvestCollect;
use Illuminate\Http\RedirectResponse;

class InvestmentCollectionContainer extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $investCollects = InvestCollect::query();
        $investCollects = $investCollects->latest()->with('investor')->paginate(10);
       // dd($investCollects->toArray());
        return view("Backend.Invest_Collect.Index",compact('investCollects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $investors = Investor::latest()->paginate(10);
        return view("Backend.Invest_Collect.Create",compact('investors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        InvestCollect::create([
            'investor_id' => $request->inv_id,
            'month' => $request->month,
            'year' => date('Y'),
            'amount' => $request->amount
        ]);
        return redirect()->back()->with('success','Investor Collection Created');
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
    public function edit($id)
    {
        $investors = Investor::latest()->paginate(10);
        $investCollect = InvestCollect::with('investor')->findOrFail($id);
        //dd($investCollect->toArray());
        return view("Backend.Invest_Collect.Edit",compact('investCollect','investors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        $investCollect = InvestCollect::with('investor')->findOrFail($id);
        $month = ($request->month) ? $request->month : $investCollect->month;

        $investCollect->month = $month;
        $investCollect->year = $request->year;
        $investCollect->amount = $request->amount;
        $investCollect->update();
        return redirect()->back()->with('update','Investor Collection Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if ($id) {
            $investCollect = InvestCollect::findOrFail($id);
            $investCollect->delete();
            return redirect()->back()->with('success','Investor Collection Deleted');
        }
    }
}
