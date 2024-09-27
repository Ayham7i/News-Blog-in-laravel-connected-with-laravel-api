<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Facades\ApiServiceFacade;


class CommentController extends Controller
{
    // protected $apiService;

    // public function __construct(ApiService $apiService)
    // {
    //     $this->apiService = $apiService;
    // }

    // Display the list of comments
    public function index()
    {
        $comments = ApiServiceFacade::getComments();
        return view('admin.comments.index', compact('comments'));
    }

    // Show the form to create a new comment
    public function create()
    {
        // Fetch articles and users for selection in the form
        $articles = ApiServiceFacade::getArticles();
        return view('admin.comments.create', compact('articles'));
    }

    // Store a new comment
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|string',
            'article_id' => 'required|exists:articles,id',
        ]);

        ApiServiceFacade::createComment($request->all());

        return redirect()->route('admin.comments.index')->with('success', 'Comment created successfully.');
    }

    // Show the form to edit a comment
    public function edit($id)
    {
        $comment = ApiServiceFacade::getComment($id);
        $articles = ApiServiceFacade::getArticles();
        return view('admin.comments.edit', compact('comment', 'articles'));
    }

    // Update the comment
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'required|string',
            'article_id' => 'required|exists:articles,id',
        ]);

        ApiServiceFacade::updateComment($id, $request->all());

        return redirect()->route('admin.comments.index')->with('success', 'Comment updated successfully.');
    }

    // Delete a comment
    public function destroy($id)
    {
        ApiServiceFacade::deleteComment($id);
        return redirect()->route('admin.comments.index')->with('success', 'Comment deleted successfully.');
    }
}
