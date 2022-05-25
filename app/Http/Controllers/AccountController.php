<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::first();
        return (view('accounts.accounts' , compact('accounts')));
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
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'email' => 'required',
            'facebook_link' => 'required',
            'linkedin_link' => 'required',
            'twitter_link' => 'required',
            'instagram_link' => 'required',
            'github_link' => 'required',

        ],[

            'email.required' => 'The Email is required',
            'facebook_link.required' => 'The Facebook Account is required',
            'linkedin_link.required' => 'The LinkedIn Account is required',
            'twitter_link.required' => 'The Twitter Account is required',
            'instagram_link.required' => 'The Instagram Account is required',
            'github_link.required' => 'The Github Account is required',

        ]);

        $accounts = Account::find($id);
        $accounts->update([
            'email' => $request->email,
            'facebook_link' => $request->facebook_link,
            'linkedin_link' => $request->linkedin_link,
            'twitter_link' => $request->twitter_link,
            'instagram_link' => $request->instagram_link,
            'github_link' => $request->github_link,
        ]);

        session()->flash('edit','The Accounts has been successfully modified');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
