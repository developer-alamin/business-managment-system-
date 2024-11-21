<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::query();
        $members = $members->paginate(10);
        return view('Member.Index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Member.Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
       Member::create([
        'member_id' => $request->member_id,
        'name' => $request->name,
        'father' => $request->father,
        'phone' => $request->phone,
        'alt_phone' => $request->alt_phone,
        'address' => $request->address,
        'date' => $request->date,
        'refer_by' => $request->ref_by
        ]);
       return redirect()->back()->with('success','Member Created Success');
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
    public function edit(Member $member)
    {
        return view('Member.Edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {

        $member->member_id = $request->member_id;
        $member->name = $request->name;
        $member->father = $request->father;
        $member->phone = $request->phone;
        $member->alt_phone = $request->alt_phone;
        $member->address = $request->address;
        $member->date = $request->date;
        $member->refer_by = $request->ref_by;

        $member->update();
        return redirect()->back()->with('update',value: 'Member Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        if ($member) {
          $member->delete();
          return redirect()->back()->with('success','Member Data Deleted');
        }
    }
}
