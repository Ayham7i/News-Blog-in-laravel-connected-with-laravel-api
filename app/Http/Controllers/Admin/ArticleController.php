<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiService;

class ArticleController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    // Display all articles
    public function index()
    {
        $articles = $this->apiService->getArticles();
        $authors = $this->apiService->getAuthors();
        $categories = $this->apiService->getCategories();

        // Passing authors and categories to the view to access names
        return view('admin.articles.index', compact('articles', 'authors', 'categories'));
    }

    // Show form for creating a new article
    public function create()
    {
        // Fetch all authors and categories to show in the dropdown
        $authors = $this->apiService->getAuthors();
        $categories = $this->apiService->getCategories();
        return view('admin.articles.create', compact('authors', 'categories'));
    }

    // Store new article
    public function store(Request $request)
    {
        $this->apiService->createArticle($request->all());
        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully');
    }

    // Show form for editing an existing article
    public function edit($id)
    {
        $article = $this->apiService->getArticle($id);
        // Fetch all authors and categories to show in the dropdown
        $authors = $this->apiService->getAuthors();
        $categories = $this->apiService->getCategories();
        return view('admin.articles.edit', compact('article', 'authors', 'categories'));
    }

    // Update the article
    public function update(Request $request, $id)
    {
        $this->apiService->updateArticle($id, $request->all());
        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully');
    }

    // Delete the article
    public function destroy($id)
    {
        $this->apiService->deleteArticle($id);
        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully');
    }
}
