<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('experiences.experiences' , compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([

            'company_name' => 'required',
            'work_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',

        ],[

            'company_name.required' =>'The Company Name filed is required',
            'work_title.required' =>'The Job Title filed is required',
            'start_date.required' =>'The Start Date filed is required',
            'end_date.required' =>'The End Date filed is required',
            'description.required' =>'The Description filed is required',

        ]);

        $experiences = Experience::create([

           'company_name' => $request->company_name,
            'work_title' => $request->work_title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,

        ]);

        session()->flash('Add' , 'Experience Added Successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $validatedData=$request->validate([

            'company_name' => 'required',
            'work_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',

        ],[

            'company_name.required' =>'The Company Name filed is required',
            'work_title.required' =>'The Job Title filed is required',
            'start_date.required' =>'The Start Date filed is required',
            'end_date.required' =>'The End Date filed is required',
            'description.required' =>'The Description filed is required',

        ]);

        $experiences = Experience::find($id);
        $experiences->update([

            'company_name' => $request->company_name,
            'work_title' => $request->work_title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,

        ]);

        session()->flash('Edit' , 'Experience Updated Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Experience::find($id)->delete();

        session()->flash('Delete','Experience Deleted Successfully');
     return back();
    }
}
