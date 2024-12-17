<?php
namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class ProductController extends Controller {
    
    public function index() {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create() {
         $categories = Category::all(); // Get all categories
         return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'namep' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|integer', // Ensure 'category_id' is required
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
        ]);

        // Handle the image upload and generate URL
        $imageUrl = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $imageUrl = Storage::url($imagePath); // Convert path to URL
        }

        Product::create([
            'namep' => $request->namep,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'image_url' => $imageUrl, // Save the URL to the image
            'category_id'=>$request->category_id,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    //public function edit(Product $product) {
      //  return view('admin.products.edit', compact('product'));
    //}
    public function edit($id)
  {
    $categories = Category::all();
    $product = Product::findOrFail($id);
    return view('admin.products.edit', compact(['categories','product']));
  }


    public function update(Request $request, Product $product) {
        $request->validate([
            'namep' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
        ]);

        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image_url = Storage::url($imagePath); // Update the URL to the new image
        }

        $product->update([
            'namep' => $request->namep,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'stock' => $request->stock,
            'image_url' => $product->image_url, // Save the existing or new image URL
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    
   public function destroy(Product $product)
{
    $product->delete();
    return redirect()->route('admin.products.index')->with('success', 'Produit supprimé avec succès');
}

    public function show($id)
   {
    $product = Product::findOrFail($id); // Retrieve product by ID
    return view('admin.products.show', compact('product'));
   }
 





}