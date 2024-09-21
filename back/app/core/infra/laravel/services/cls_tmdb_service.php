<?php

namespace App\core\infra\laravel\services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class cls_tmdb_service {
    protected $client;

    public function __construct() {
        $this->client = new Client([
            'base_uri' => config('tmdb.base_url'),
        ]);
    }

    public function getMovieById($id) {
        try {
            $response = $this->client->get("3/movie/{$id}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . config('tmdb.api_key'),
                    'accept' => 'application/json',
                ],
                'query' => [
                    'language' => 'pt-BR',
                ],
                ]);

                return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return $e->getMessage();
        }
    }

    public function getPosterByMovieId($id) {
        $movie_details = $this->getMovieById($id);

        //return poster_path
        // \Log::info($movie_details);
        return $movie_details['poster_path'];
    }
}
