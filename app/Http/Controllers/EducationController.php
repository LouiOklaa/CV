<?php

namespace App\Http\Controllers;

use App\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $degrees = Education::all();
        return view('education.education' , compact('degrees'));
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

            'degree' => 'required',
            'university' => 'required',
            'specialization' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',

        ],[

            'degree.required' =>'The Degree filed is required',
            'university.required' =>'The University / School filed is required',
            'specialization.required' =>'The Specialization filed is required',
            'start_date.required' =>'The Start Date filed is required',
            'end_date.required' =>'The End Date filed is required',
            'description.required' =>'The Description filed is required',

        ]);

        $degrees = Education::create([

            'degree' => $request->degree,
            'university' => $request->university,
            'specialization' => $request->specialization,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,

        ]);

        session()->flash('Add' , 'Degree Added Successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $validatedData=$request->validate([

            'degree' => 'required',
            'university' => 'required',
            'specialization' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',

        ],[

            'degree.required' =>'The Degree filed is required',
            'university.required' =>'The University / School filed is required',
            'specialization.required' =>'The Specialization filed is required',
            'start_date.required' =>'The Start Date filed is required',
            'end_date.required' =>'The End Date filed is required',
            'description.required' =>'The Description filed is required',

        ]);

        $degrees = Education::find($id);
        $degrees->update([

            'degree' => $request->degree,
            'university' => $request->university,
            'specialization' => $request->specialization,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,

        ]);

        session()->flash('Edit' , 'Degree Updated Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Education::find($id)->delete();

        session()->flash('Delete','Degree Deleted Successfully');
        return back();
    }
}
