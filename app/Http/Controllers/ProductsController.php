<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $users = user::all();
     $products = products::with('users')->get();

     return view('dashboard', compact('products', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_produk' => 'required',
            'kode_produk' => 'required|unique:products',
            'stock' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        products::create($request->all());
        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(products $products)
    {
      //  return view('products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(products $products)
    {

        return view('products.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, products $products )
    {
        $request->validate([
            'name_produk' => 'required',
            'kode_produk' => 'required',
            'stock' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $products->update($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(products $products)
    {
        $products->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully.');
    }

    public function destroy(products $products)
    {

        $products->delete();
        
        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully.');
    }
}
