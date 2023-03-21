<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CatService
{
    const CAT_API_URL_V1 = 'https://api.thecatapi.com/v1';

    public function getCats()
    {
        return self::getCatsApiData();
    }

    public function getCatsApiData()
    {
        $response = Http::get(self::CAT_API_URL_V1 . '/breeds');
        $response = collect($response->json());
        return $response->map(function ($item, $key) {
            return [...$item, "animal_type" => 'cat'];
        });
    }

    public function getSpecificBreed($breed)
    {
        $response = Http::get(self::CAT_API_URL_V1 . "/breeds/" . $breed);
        return $response->json();
    }

    public function getCatImages($image)
    {
        $response = Http::get(self::CAT_API_URL_V1 . "/images/" . $image);
        return $response->json();
    }
}
