<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard-account');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard-account-form');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //request validate
        $request->validate([
            'name' => ['required', 'min:2', 'max:100'],
            'firstname' => ['required', 'min:2', 'max:100'],
            'sexe' => ['required'],
            'email' => ['required', 'email:rfc,dns'],
            'phone_number' => ['required', 'numeric', 'regex:/(06)|(07)[0-9]{8}/', 'digits:10'],
            'date_of_birth' => ['required', 'date'],
        ]);
        $user = User::find($id);
        $user->sexe = $request->sexe;
        $user->name = $request->name;
        $user->firstname = $request->firstname;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        // $user->password = $request->password;
        $user->date_of_birth = $request->date_of_birth;
        $user->save();
        // var_dump($request->phone_number);
        // exit;
        return view('dashboard-account');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
