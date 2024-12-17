<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategory($categoryName)
    {
        $category = Category::where('name', $categoryName)->first();

      if (!$category) {
            // Handle the case where the category is not found
         return redirect()->back()->with('error', 'Category not found.');
       }

        // Now we can safely access $category->id
       $products = Product::where('category_id', $category->id)->get();
        
       return view('category.' . strtolower($category->name), compact('products'));
    }

    // Custom method for Hypertension category
    public function showHypertension()
    {
        $category = Category::where('name', 'Hypertension')->first();

        if (!$category) {
            // Handle the case where the category is not found
            return redirect()->back()->with('error', 'Category not found.');
        }

        // Now we can safely access $category->id
        $products = Product::where('category_id', $category->id)->get();

        return view('category.hypertension', compact('products'));
    }
      public function showCancer()
    {
        $category = Category::where('name', 'Cancer')->first();

        if (!$category) {
            // Handle the case where the category is not found
            return redirect()->back()->with('error', 'Category not found.');
        }

        // Now we can safely access $category->id
        $products = Product::where('category_id', $category->id)->get();

        return view('category.cancer', compact('products'));
    }
      public function showDiabete()
    {
        $category = Category::where('name', 'diabetes')->first();

        if (!$category) {
            // Handle the case where the category is not found
            return redirect()->back()->with('error', 'Category not found.');
        }

        // Now we can safely access $category->id
        $products = Product::where('category_id', $category->id)->get();

        return view('category.diabetes', compact('products'));
    }
    public function index(){
        return view('');
    }
}