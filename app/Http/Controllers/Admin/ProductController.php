<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\medicines;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1️⃣ Show all medicines
    public function index()
    {
        $product = medicines::paginate(10);
        return view('Admin.products.product', compact('product'));
    }

    // 2️⃣ Show create form
    public function create()
    {
        $category = Category::where('status', 1)->get();
        return view('Admin.products.AddProducts', compact('category'));
    }

    // 3️⃣ Store medicine
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'company' => 'required|string|max:255',
            'strength' => 'required|string|max:50',
            'type' => 'required|string|max:50',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|integer|min:1',
            'batch_no' => 'required|string|max:100',
            'expiry_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        $img = null;
        if ($request->hasFile('image')) {
            $img = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $img);
        }

        medicines::create([
            'name' => $request->name,
            'image' => $img,
            'company' => $request->company,
            'strength' => $request->strength,
            'type' => $request->type,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'batch_no' => $request->batch_no,
            'expiry_date' => $request->expiry_date,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.product')
            ->with('success', 'Medicine added successfully');
    }

    // 4️⃣ Destroy medicine
    public function destroy($id)
    {
        $med = medicines::findOrFail($id);

        // Delete image if exists
        if ($med->image && file_exists(public_path('uploads/' . $med->image))) {
            unlink(public_path('uploads/' . $med->image));
        }

        $med->delete();

        return redirect()->route('products.product')->with('success', 'Medicine deleted successfully');
    }

    // 5️⃣ Edit medicine
    public function edit($id)
    {
        $product = medicines::findOrFail($id);
        $category = Category::where('status', 1)->get();
        return view('Admin.products.editProduct', compact('product', 'category'));
    }

    // 6️⃣ Update medicine
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'company' => 'required|string|max:255',
            'strength' => 'required|string|max:50',
            'type' => 'required|string|max:50',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|integer|min:1',
            'batch_no' => 'required|string|max:100',
            'expiry_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = medicines::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path('uploads/' . $product->image))) {
                unlink(public_path('uploads/' . $product->image));
            }

            $img = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $img);
            $product->image = $img;
        }

        $product->name = $request->name;
        $product->company = $request->company;
        $product->strength = $request->strength;
        $product->type = $request->type;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->batch_no = $request->batch_no;
        $product->expiry_date = $request->expiry_date;
        $product->category_id = $request->category_id;

        $product->save();

        return redirect()->route('products.product')->with('success', 'Medicine updated successfully');
    }
}
