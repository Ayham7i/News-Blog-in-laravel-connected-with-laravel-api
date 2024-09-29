<?php

namespace App\Services;

use GuzzleHttp\Client;

class ApiService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('API_URL')
        ]);
    }

    //  Article API Methods

    public function getArticles()
    {
        $response = $this->client->get('api/articles');
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getArticle($id)
    {
        $response = $this->client->get("api/articles/{$id}");
        return json_decode($response->getBody()->getContents(), true);
    }

    public function createArticle($data)
    {
        $response = $this->client->post('api/articles', [
            'form_params' => $data
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function updateArticle($id, $data)
    {
        $response = $this->client->put("api/articles/{$id}", [
            'form_params' => $data
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function deleteArticle($id)
    {
        $response = $this->client->delete("api/articles/{$id}");
        return json_decode($response->getBody()->getContents(), true);
    }

    // Author API Methods

    public function getAuthors()
    {
        $response = $this->client->get('api/authors');
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getAuthor($id)
    {
        $response = $this->client->get("api/authors/{$id}");
        return json_decode($response->getBody()->getContents(), true);
    }

    public function createAuthor($data)
    {
        $response = $this->client->post('api/authors', [
            'form_params' => $data
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function updateAuthor($id, $data)
    {
        $response = $this->client->put("api/authors/{$id}", [
            'form_params' => $data
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function deleteAuthor($id)
    {
        $response = $this->client->delete("api/authors/{$id}");
        return json_decode($response->getBody()->getContents(), true);
    }

    // --- Category API Methods ---


    public function getCategories()
    {
        $response = $this->client->get('api/categories');
        return json_decode($response->getBody()->getContents(), true);
    }


    public function getCategory($id)
    {
        $response = $this->client->get("api/categories/{$id}");
        return json_decode($response->getBody()->getContents(), true);
    }


    public function createCategory($data)
    {
        $response = $this->client->post('api/categories', [
            'form_params' => $data
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function updateCategory($id, $data)
    {
        $response = $this->client->put("api/categories/{$id}", [
            'form_params' => $data
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function deleteCategory($id)
    {
        $response = $this->client->delete("api/categories/{$id}");
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getComments()
    {
        $response = $this->client->get('api/comments');
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getComment($id)
    {
        $response = $this->client->get("api/comments/{$id}");
        return json_decode($response->getBody()->getContents(), true);
    }

    public function createComment($data)
    {
        $response = $this->client->post('api/comments', [
                'form_params' => $data
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function updateComment($id, $data)
    {
        $response = $this->client->put("api/comments/{$id}", [
            'form_params' => $data
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function deleteComment($id)
    {
        $response = $this->client->delete("api/comments/{$id}");
        return json_decode($response->getBody()->getContents(), true);
    }









}
