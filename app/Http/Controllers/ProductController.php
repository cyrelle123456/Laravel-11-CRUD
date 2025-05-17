<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Uncomment to use the Product model

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10); // Use pagination
        return view('products.index', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->except(['_token', '_method']);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }
        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token', '_method']);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }
        $product = Product::create($data);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Add other resource methods (create, store, show, edit, update, destroy) as needed
} 