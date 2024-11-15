<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::query();
        $notes = $notes->paginate(10);
        return view('Notes.Index',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Notes.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Note::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status
        ]);
        return redirect()->back()->with('success','Note Created Success');    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view("Notes.Edit",compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return view("Notes.Edit",compact('note'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $note->name = $request->name;
        $note->status = $request->status;
        $note->description = $request->description;
        $note->update();
        return redirect()->back()->with('update',"Note Updated Success");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if($note){
            $note->delete();
            return redirect()->back()->with('success',"Note Deleted Success");
        }
    }
}
