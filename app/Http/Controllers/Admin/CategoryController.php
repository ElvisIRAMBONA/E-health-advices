<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Show the list of categories
    public function index()
    {
        $categories = Category::all(); // Fetch all categories from the database
        return view('admin.categories.index', compact('categories')); // Pass categories to the view
    }

    // Show the form to create a new category
    public function create()
    {
        return view('admin.categories.create'); // Return the create category form view
         // Validate the request data
   
    }
    // Store a newly created category in the database
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name', // Ensure unique category name
        ]);

        // Create the category using the validated data
        Category::create([
            'name' => $request->name,
        ]);

        // Redirect back to the categories list with a success message
        return redirect()->route('admin.categories.index')
            ->with('success', 'Catégorie ajoutée avec succès!');
    }

    // Show the form to edit an existing category
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category')); // Return the edit form view with the category data
    }

    // Update the specified category in the database
    public function update(Request $request, Category $category)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id, // Ensure name is unique excluding current category
           
        ]);

        // Update the category with the validated data
        $category->update([
            'name' => $request->name,
           
        ]);

        // Redirect back to the categories list with a success message
        return redirect()->route('admin.categories.index')
            ->with('success', 'Catégorie mise à jour avec succès!');
    }

    // Remove the specified category from the database
    public function destroy(Category $category)
    {
        // Delete the category from the database
        $category->delete();

        // Redirect back to the categories list with a success message
        return redirect()->route('admin.categories.index')
            ->with('success', 'Catégorie supprimée avec succès!');
    }
}