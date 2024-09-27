<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Facades\ApiServiceFacade;


class AuthorController extends Controller
{
    // protected $apiService;

    // public function __construct(ApiService $apiService)
    // {
    //     $this->apiService = $apiService;
    // }

    public function index()
    {
        $authors = ApiServiceFacade::getAuthors();
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

        ApiServiceFacade::createAuthor($validatedData);
        return redirect()->route('admin.authors.index')->with('success', 'Author created successfully');
    }

    public function edit($id)
    {
        $author = ApiServiceFacade::getAuthor($id);
        return view('admin.authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email,' . $id,
        ]);

        ApiServiceFacade::updateAuthor($id, $validatedData);
        return redirect()->route('admin.authors.index')->with('success', 'Author updated successfully');
    }

    public function destroy($id)
    {
        ApiServiceFacade::deleteAuthor($id);
        return redirect()->route('admin.authors.index')->with('success', 'Author deleted successfully');
    }
}
