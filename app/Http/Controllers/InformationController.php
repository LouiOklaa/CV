<?php

namespace App\Http\Controllers;

use App\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $information = Information::first();
        return view('my_information.my_information' , compact('information'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'name' => 'required',
            'age' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'language' => 'required',
            'work' => 'required',
            'about_me' => 'required',

        ],[

            'name.required' => 'The Name filed is required',
            'age.required' => 'The Age filed is required',
            'phone_number.required' => 'The Number filed is required',
            'address.required' => 'The Address filed is required',
            'language.required' => 'The Language filed is required',
            'work.required' => 'The Work filed is required',
            'about_me.required' => 'The About Me filed is required',

        ]);

        $information = Information::find($id);
        $information->update([
            'name' => $request->name,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'language' => $request->language,
            'work' => $request->work,
            'about_me' => $request->about_me,
        ]);

        if ($request->hasFile('attachment1')){

            $image1 = $request->file('attachment1');
            $file_name1 = rand() . '.' . $image1->getClientOriginalExtension();
            $information->profile_photo = $file_name1;
            $information->save();

            // Move File
            $request->attachment1->move(public_path('Attachments/Photo'), $file_name1);
        }

        if ($request->hasFile('attachment2')){

            $image2 = $request->file('attachment2');
            $file_name2 = rand() . '.' . $image2->getClientOriginalExtension();
            $information->cover_photo = $file_name2;
            $information->save();

            // Move File
            $request->attachment2->move(public_path('Attachments/Photo'), $file_name2);

        }

        if ($request->hasFile('attachment3')){

            $image3 = $request->file('attachment3');
            $file_name3 = rand() . '.' . $image3->getClientOriginalExtension();
            $information->contact_me_photo = $file_name3;
            $information->save();

            // Move File
            $request->attachment3->move(public_path('Attachments/Photo'), $file_name3);

        }

        if ($request->hasFile('attachment4')){

            $pdf = $request->file('attachment4');
            $file_name4 = rand() . '.' . $pdf->getClientOriginalExtension();
            $information->CV_pdf = $file_name4;
            $information->save();

            // Move Files
            $request->attachment4->move(public_path('Attachments/MY CV'), $file_name4);

        }

        session()->flash('edit','The information has been successfully modified');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        //
    }
}
