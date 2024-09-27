<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $authors = $this->apiService->getAuthors();
        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
        ]);

        $this->apiService->createAuthor($validatedData);
        return redirect()->route('admin.authors.index')->with('success', 'Author created successfully');
    }

    public function edit($id)
    {
        $author = $this->apiService->getAuthor($id);
        return view('admin.authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email,' . $id,
        ]);

        $this->apiService->updateAuthor($id, $validatedData);
        return redirect()->route('admin.authors.index')->with('success', 'Author updated successfully');
    }

    public function destroy($id)
    {
        $this->apiService->deleteAuthor($id);
        return redirect()->route('admin.authors.index')->with('success', 'Author deleted successfully');
    }
}
