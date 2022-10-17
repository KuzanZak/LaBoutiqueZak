<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard-role',
            [
                'roles' => Role::all()->sortBy('id'),
                'admin' => intval(Auth::user()->role_id)
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            "dashboard-role-form",
            [
                'action' => route('dashboard/role/add'),
                'role' => old('role'),
                'pageJs' => "",
                'edit' => "add",
                'value' => "Ajouter le rôle"
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => ['required', 'min: 5', 'max:20'],
        ]);
        $role = new Role();
        $role->role_name = $request->role;
        $role->save();
        return Redirect::route('dashboard/role/create');
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
        $role = Role::find($id);
        return view(
            'dashboard-role-form',
            [
                'roles' => Role::all(),
                'admin' => Auth::user()->role_id,
                'action' => route('dashboard/role/update', $role->id),
                'role' => $role->role_name,
                'pageJs' => "",
                'edit' => 'update',
                'value' => "Actualiser"
            ]
        );
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
        $request->validate([
            'role' => ['required', 'min: 5', 'max:20'],
        ]);
        $role = Role::find($id);
        $role->role_name = $request->role;
        $role->save();
        return Redirect::route('dashboard/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return Redirect::route('dashboard/role');
    }
}
