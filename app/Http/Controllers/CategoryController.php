<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard-category',
            [
                'categories' => Category::all()->sortBy('id'),
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
            "dashboard-category-form",
            [
                'action' => route('dashboard/category/add'),
                'category' => old('category'),
                'pageJs' => "",
                'edit' => "add",
                'value' => "Ajouter la catégorie"
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
            'category' => ['required', 'min: 5', 'max:50'],
        ]);
        $category = new Category();
        $category->category_name = $request->category;
        $category->save();
        return Redirect::route('dashboard/category/create');
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
        $category = Category::find($id);
        return view(
            'dashboard-category-form',
            [
                'categories' => Category::all(),
                'admin' => Auth::user()->role_id,
                'action' => route('dashboard/category/update', $category->id),
                'category' => $category->category_name,
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
            'category' => ['required', 'min: 5', 'max:50'],
        ]);
        $category = Category::find($id);
        $category->category_name = $request->category;
        $category->save();
        return Redirect::route('dashboard/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return Redirect::route('dashboard/category');
    }
}
