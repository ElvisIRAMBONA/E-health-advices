<?php
namespace App\Http\Controllers;
 use App\Models\Product; // Ensure Product model is properly defined 
 use Illuminate\Http\Request;
  class ProductController extends Controller { 
  // Display products related to Hypertension
 public function showHypertensionProducts() {
   $products=Product::where('category_id', 3)->get(); // Replace 1 withactual category ID for Hypertension
    return view('hypertension', compact('products'));
    }

    // Display products related to Diabetes
    public function showDiabetesProducts()
    {
    $products = Product::where('category_id', 1)->get(); // Replace 2 with actual category ID for Diabetes
    return view('diabetes', compact('products'));
    }

    // Display products related to Cancer
    public function showCancerProducts()
    {
    $products = Product::where('category_id', 2)->get(); // Replace 3 with actual category ID for Cancer
    return view('cancer', compact('products'));
    }

    // Show a single product's details
    public function showProduct($id)
    {
    $product = Product::findOrFail($id);
    return view('products.show', compact('product'));
    }
    public function show($id)
    {
    // Fetch the product by ID
    $product = Product::findOrFail($id);

    // Return a view with the product details
    return view('admin.products.show', compact('product'));
    }
    public function edit($id)
    {
    $product = Product::findOrFail($id);

    return view('admin.products.edit', compact('product'));
   }


    }