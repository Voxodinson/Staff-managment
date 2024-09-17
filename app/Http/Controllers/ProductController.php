<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Products;
class ProductController extends Controller

{
    //get product
    public function index() {
        $products = Products::all();
        return view('marketplace', ['products' => $products]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|integer',
            'product_instock' => 'required|integer',
            'description' => 'nullable|string',
            'tag' => 'nullable|string',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_images' => 'required|array|min:1|max:5',
        ]);
    
        $product = new Products();
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_instock = $request->input('product_instock');
        $product->description = $request->input('description');
        $product->tag = $request->input('tag');
    
        if ($request->hasFile('product_images')) {
            $imageNames = [];
            foreach ($request->file('product_images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/product_images', $imageName);
                $imageNames[] = $imageName;
            }
            $product->product_images = json_encode($imageNames);
        }
    
        $product->save();
    
        return redirect()->route('marketplace')->with('msg', 'Adding Product Succesfully');
    }
    
    public function update(Request $request, $id)
{
    $request->validate([
        'product_name' => 'required|string|max:255',
        'product_price' => 'required|integer',
        'product_instock' => 'required|integer',
        'description' => 'nullable|string',
        'tag' => 'nullable|string',
        'product_images' => 'nullable|array',
        'product_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product = Products::findOrFail($id);
    $product->product_name = $request->input('product_name');
    $product->product_price = $request->input('product_price');
    $product->product_instock = $request->input('product_instock');
    $product->description = $request->input('description');
    $product->tag = $request->input('tag');

    // Handle multiple product images
    if ($request->hasFile('product_images')) {
        $existingImages = json_decode($product->product_images, true); // Decode existing images from JSON
        $imageNames = $existingImages ? $existingImages : []; // Initialize with existing images or an empty array
    
        foreach ($request->file('product_images') as $index => $image) {
            // Generate a new image name
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            // Store the new image
            $image->storeAs('public/product_images', $imageName);
    
            // Replace the old image at the current index if it exists
            if (isset($imageNames[$index])) {
                // Optionally, delete the old image from storage
                Storage::delete('public/product_images/' . $imageNames[$index]);
            }
    
            // Update the image name at the current index
            $imageNames[$index] = $imageName;
        }
    
        // Update the product images in the database
        $product->product_images = json_encode($imageNames);
    }
    
    $product->save();

    return redirect()->route('product.update', $product->product_id)->with('msg', 'Product update successfully..!');
}
public function show($id){
    $product = Products::findOrFail($id);
    return view('product-detail', ['product'=> $product]);
 }
 public function edit($id)
{
    $product = Products::findOrFail($id); // Find the product by ID
    return view('update-product', ['product'=> $product]); // Pass the product to the view
}
public function destroy($id){
    $product = Products::findOrFail($id);
    $product->delete();

    return redirect()->route('marketplace')->with('msg', "Employee $product->id deleted sucessfully");
}
}
