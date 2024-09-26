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

    public function getAuthors()
    {
        // Fetch authors from the API
        $response = $this->client->get('api/authors');
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getCategories()
    {
        // Fetch categories from the API
        $response = $this->client->get('api/categories');
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
}
