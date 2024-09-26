<?php

namespace App\Services;

use GuzzleHttp\Client;

class ApiService
{
    protected $client;

    public function __construct()
    {
        // Set the base URI for the API
        $this->client = new Client([
            'base_uri' => env('API_URL')
        ]);
    }

    // --- Article API Methods ---

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

    // --- Author API Methods ---

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
}
