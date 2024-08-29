<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function index()
    {
        $categoryProducts = CategoryProduct::paginate(12);
        return view('category_product.index', compact('categoryProducts'));
    }

    public function create()
    {
        return view('category_product.create');
    }

    public function show($id)
    {
        $categoryProduct = CategoryProduct::findOrFail($id);
        return view('category_product.show', compact('categoryProduct'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'price' => 'required|numeric',
        ]);
    
        
        $categoryProduct = new CategoryProduct();
        $categoryProduct->name = $request->input('name');
        $categoryProduct->description = $request->input('description');
        $categoryProduct->code = $request->input('code');
        $categoryProduct->quantity = $request->input('quantity', 0);
        $categoryProduct->price = $request->input('price');
        $categoryProduct->save();

        return redirect()->route('category_product.index');
    }

    public function edit($id)
    {
        $categoryProduct = CategoryProduct::find($id);
        if (!$categoryProduct){
            return redirect()->route('category_product.index')->with('eror','Kategori tidak ditemukan');
        }
        return view('category_product.edit', compact('categoryProduct'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'nullable|integer',
        ]);

        $categoryProduct = CategoryProduct::find($id);
        if ($categoryProduct){
            $categoryProduct = CategoryProduct::find($id);
            $categoryProduct->name = $request->input('name');
            $categoryProduct->description = $request->input('description');
            $categoryProduct->code = $request->input('code');
            $categoryProduct->quantity = $request->input('quantity', 0);
            $categoryProduct->price = $request->input('price');
            $categoryProduct->save();
        } else{
            return redirect()->route('category_product.index')->with('error', 'Kategori tidak ditemukan');
        }
        return redirect()->route('category_product.index');
    }

    public function destroy($id)
    {
        $categoryProduct = CategoryProduct::find($id);
        if ($categoryProduct){
            $categoryProduct->delete();
        } else{
            return redirect()->route('category_product.index');
        }
        return redirect()->route('category_product.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $categoryProducts = CategoryProduct::where('name', 'like', '%' . $search . '%')->get();
        return view('category_product.index', compact('categoryProducts'));
    }
}