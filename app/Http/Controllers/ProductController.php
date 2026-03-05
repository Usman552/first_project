<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1️⃣ Show all products
    public function index()
    {
        $product = Product::paginate(10);

        return view('pages.products.product', compact('product'));
    }

    public function create()
    {
        $category = Category::where('status', 1)->get();
        return view('pages.products.AddProducts', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'full_price' => 'required|integer|min:1',
            'original_price' => 'required|integer|min:1',
            'short_description' => 'required|string|max:255',
            'sku' => 'required|string|max:100|unique:products,sku',
            'brand' => 'string|max:100',
            'long_description' => 'string',
            'weight' => 'string',
            'dimension' => 'string|max:100',
            'category_id' => 'required|exists:categories,id,status,1',

        ]);

        $img = null;
        if ($request->hasFile('image')) {
            $img = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $img);
        }

        Product::create([
            'name' => $request->name,
            'image' => $img,
            'full_price' => $request->full_price,
            'original_price' => $request->original_price,
            'short_description' => $request->short_description,
            'sku' => $request->sku,
            'brand' => $request->brand,
            'long_description' => $request->long_description,
            'weight' => $request->weight,
            'dimension' => $request->dimension,
            'category_id' => $request->category_id,
            // 'name' => $request->name,
        ]);

        return redirect()->route('products.product')
            ->with('success', 'Product added successfully');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('products.product')->with('success', 'Product Deleted successfully');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.products.editProduct', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'full_price' => 'required|integer|min:1',
            'original_price' => 'required|integer|min:1',
            'short_description' => 'required|string|max:255',
            'sku' => 'required|string|max:100|unique:products,sku,' . $id,
            'brand' => 'string|max:100',
            'long_description' => 'string',
            'weight' => 'string',
            'dimension' => 'string|max:100',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            // Old image delete
            if ($product->image && file_exists(public_path('uploads/' . $product->image))) {
                unlink(public_path('uploads/' . $product->image));
            }

            $img = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $img);
            $product->image = $img;
        }

        $product->name = $request->name;
        $product->full_price = $request->full_price;
        $product->original_price = $request->original_price;
        $product->short_description = $request->short_description;
        $product->sku = $request->sku;
        $product->brand = $request->brand;
        $product->long_description = $request->long_description;
        $product->weight = $request->weight;
        $product->dimension = $request->dimension;

        $product->save();

        return redirect()->route('products.product')->with('success', 'Product updated successfully');
    }
}
