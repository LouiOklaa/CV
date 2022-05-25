<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use PHPUnit\Util\GlobalState;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Gallery::all();
        return view('gallery.gallery' , compact('projects'));
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

            'project_title' => 'required|unique:galleries',
            'project_link' => 'required|unique:galleries',
            'project_image' => 'required',

        ],[

            'project_title.required' =>'The Title filed is required',
            'project_title.unique' =>'The Project Already Exists',
            'project_link.required' =>'The Project Link filed is required',
            'project_link.unique' =>'The Project Link Already Exists',
            'project_image.required' =>'The Project Photo filed is required',

        ]);

        $projects = Gallery::create([

            'project_title' => $request->project_title,
            'project_link' => $request->project_link,

        ]);

        $img = $request->file('project_image');
        $file_name = rand() . '.' . $img->getClientOriginalExtension();
        $projects->project_image = $file_name;
        $projects->save();

        // Move Files
        $request->project_image->move(public_path('Attachments/Projects'), $file_name);

        session()->flash('Add' , 'Project Added Successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $validatedData=$request->validate([

            'project_title' => 'required|unique:galleries,project_title,'.$id,
            'project_link' => 'required|unique:galleries,project_link,'.$id,

        ],[

            'project_title.required' =>'The Title filed is required',
            'project_title.unique' =>'The Project Already Exists',
            'project_link.required' =>'The Project Link filed is required',
            'project_link.unique' =>'The Project Link Already Exists',

        ]);

        $projects = Gallery::find($id);
        $projects->update([
            'project_title' => $request->project_title,
            'project_link' => $request->project_link,
        ]);

        if ($request->hasFile('project_image')){

            $image = $request->file('project_image');
            $file_name = rand() . '.' . $image->getClientOriginalExtension();
            $projects->project_image = $file_name;
            $projects->save();

            // Move File
            $request->project_image->move(public_path('Attachments/Projects'), $file_name);
        }

        session()->flash('Edit' , 'Projects Updated Successfully');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Gallery::find($id)->delete();

        session()->flash('Delete','Project Deleted Successfully');
        return redirect('/gallery');
    }
}
