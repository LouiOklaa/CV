<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::all();
        return view('skills.skills' , compact('skills'));
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

            'skill_name' => 'required|unique:skills',
            'skill_percentage' => 'required|integer|between:1,100',

        ],[

            'skill_name.required' =>'The Skill Name filed is required',
            'skill_name.unique' =>'The Skill Name Already Exists',
            'skill_percentage.required' =>'The Skill Percentage filed is required',
            'skill_percentage.between' =>'The Skill Percentage out of range',

        ]);

        $skills = Skill::create([

            'skill_name' => $request->skill_name,
            'skill_percentage' => $request->skill_percentage,

        ]);

        session()->flash('Add' , 'Skill Added Successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'skill_name' => 'required|unique:Skills,skill_name,'.$id,
            'skill_percentage' => 'required|integer|between:1,100',
        ],[

            'skill_name.required' =>'The Skill Name filed is required',
            'skill_name.unique' =>'The Skill Name Already Exists',
            'skill_percentage.required' =>'The Skill Percentage filed is required',
            'skill_percentage.between' =>'The Skill Percentage out of range',

        ]);

        $skills = Skill::find($id);
        $skills->update([

            'skill_name' => $request->skill_name,
            'skill_percentage' => $request->skill_percentage,

        ]);

        session()->flash('Edit' , 'Skill Updated Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Skill::find($id)->delete();

        session()->flash('Delete','Skill Deleted Successfully');
        return redirect('/skills');
    }
}
