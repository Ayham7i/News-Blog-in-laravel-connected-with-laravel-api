<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Facades\ApiServiceFacade;


class CategoryController extends Controller
{
    // protected $apiService;

    // public function __construct(ApiService $apiService)
    // {
    //     $this->apiService = $apiService;
    // }

    public function index()
    {
        $categories = ApiServiceFacade::getCategories();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        ApiServiceFacade::createCategory($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = ApiServiceFacade::getCategory($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        ApiServiceFacade::updateCategory($id, $request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        ApiServiceFacade::deleteCategory($id);
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
