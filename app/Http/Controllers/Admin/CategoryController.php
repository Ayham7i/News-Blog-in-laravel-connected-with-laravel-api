<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    // Display the list of categories
    public function index()
    {
        $categories = $this->apiService->getCategories();
        return view('admin.categories.index', compact('categories'));
    }

    // Show the form to create a new category
    public function create()
    {
        return view('admin.categories.create');
    }

    // Store a new category
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        $this->apiService->createCategory($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    // Show the form to edit a category
    public function edit($id)
    {
        $category = $this->apiService->getCategory($id);
        return view('admin.categories.edit', compact('category'));
    }

    // Update the category
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        $this->apiService->updateCategory($id, $request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    // Delete a category
    public function destroy($id)
    {
        $this->apiService->deleteCategory($id);
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
