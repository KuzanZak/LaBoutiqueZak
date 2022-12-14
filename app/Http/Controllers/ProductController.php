<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'dashboard-product',
            [
                'products' => Product::all()->sortBy('id'),
                'admin' => intval(Auth::user()->role_id),
                'pageJs' => "hiddenProduct",
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
            "dashboard-product-form",
            [
                'categories' => Category::all()->sortBy('id'),
                'images' => Image::whereNull('product_id')->get(),
                'action' => route('dashboard/product/add'),
                'pageJs' => "images",
                'edit' => "add",
                'value' => "Ajouter le produit",
                'product_name' => old('product'),
                'price' => old('price'),
                'description' => old('description'),
                'stock' => old("stock"),
                'categoryOfProduct' => "",
                'arrayImages' => [],
                'mainImage' => "",
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
            'product_name' => ['required', 'min:5', 'max:255'],
            'description' => ['required', 'min:50', 'max:1000'],
            'price' => ['required', 'numeric', 'min:1'],
            'stock' => ['required', 'numeric', 'min:0'],
            'category' => ['required'],
            'main' => ['required'],
        ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        $product->image_id = $request->main;
        $product->save();
        foreach ($request->checkbox as $id) {
            $image = Image::find($id);
            $image->product_id = $product->id;
            $image->save();
        }
        return Redirect::route('dashboard/product');
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
        $product = Product::find($id);
        $images = $product->images;
        $arrayImages = [];
        foreach ($images as $image) {
            $arrayImages[] = $image->id;
        };
        return view(
            'dashboard-product-form',
            [
                'categories' => Category::all()->sortBy('id'),
                'images' => Image::where('product_id', '=', $product->id)->orWhere('product_id', '=', null,)->orWhere('product_id', '=', 0)->get(),
                'action' => route('dashboard/product/update', $product->id),
                'pageJs' => "",
                'value' => "Actualiser",
                'product_name' => $product->product_name,
                'description' => $product->description,
                'price' => $product->price,
                'stock' => $product->stock,
                'categoryOfProduct' => $product->category->id,
                'arrayImages' => $arrayImages,
                'mainImage' => $product->image_id
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
        $product = Product::find($id);
        foreach ($product->images as $image) {
            $image->product_id = 0;
            $image->save();
        };
        $request->validate([
            'product_name' => ['required', 'min:5', 'max:255'],
            'description' => ['required', 'min:50', 'max:1000'],
            'price' => ['required', 'numeric', 'min:1'],
            'stock' => ['required', 'numeric', 'min:0'],
            'category' => ['required'],
            'main' => ['required'],
        ]);

        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        $product->image_id = $request->main;
        $product->save();

        foreach ($request->checkbox as $id) {
            $image = Image::find($id);
            $image->product_id = $product->id;
            $image->save();
        }
        return Redirect::route('dashboard/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        foreach ($product->images as $image) {
            $image->product_id = 0;
        };
        $product->delete();
        return Redirect::route('dashboard/product');
    }
}
