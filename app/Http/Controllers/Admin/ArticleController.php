<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiService;
use App\Facades\ApiServiceFacade;

class ArticleController extends Controller
{
    // protected $apiService;

    // public function __construct(ApiService $apiService)
    // {
    //     $this->apiService = $apiService;
    // }

    public function index()
    {
        $articles = ApiServiceFacade::getArticles();
        $authors = ApiServiceFacade::getAuthors();
        $categories = ApiServiceFacade::getCategories();

        return view('admin.articles.index', compact('articles', 'authors', 'categories'));
    }

    public function create()
    {
        $authors = ApiServiceFacade::getAuthors();
        $categories = ApiServiceFacade::getCategories();
        return view('admin.articles.create', compact('authors', 'categories'));
    }

    public function store(Request $request)
    {
        ApiServiceFacade::createArticle($request->all());
        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully');
    }

    public function edit($id)
    {
        $article = ApiServiceFacade::getArticle($id);

        $authors = ApiServiceFacade::getAuthors();
        $categories = ApiServiceFacade::getCategories();
        return view('admin.articles.edit', compact('article', 'authors', 'categories'));
    }

    public function update(Request $request, $id)
    {
        ApiServiceFacade::updateArticle($id, $request->all());
        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        ApiServiceFacade::deleteArticle($id);
        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully');
    }
}
