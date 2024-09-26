<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    // Display all authors
    public function index()
    {
        $authors = $this->apiService->getAuthors();
        return view('admin.authors.index', compact('authors'));
    }

    // Show form to create a new author
    public function create()
    {
        return view('admin.authors.create');
    }

    // Store a new author
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email|max:255',
        ]);

        $this->apiService->createAuthor($data);

        return redirect()->route('admin.authors.index')->with('success', 'Author created successfully.');
    }

    // Show the edit form for an existing author
    public function edit($id)
    {
        $author = $this->apiService->getAuthor($id);

        return view('admin.authors.edit', compact('author'));
    }

    // Update an existing author
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email|max:255',
        ]);

        $this->apiService->updateAuthor($id, $data);

        return redirect()->route('admin.authors.index')->with('success', 'Author updated successfully.');
    }

    // Delete an existing author
    public function destroy($id)
    {
        $this->apiService->deleteAuthor($id);

        return redirect()->route('admin.authors.index')->with('success', 'Author deleted successfully.');
    }
}
