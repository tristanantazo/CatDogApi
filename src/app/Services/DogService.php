<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DogService
{
    const DOG_API_URL_V1 = 'https://api.thedogapi.com/v1';

    public function getDogsApiData()
    {
        $response = Http::get(self::DOG_API_URL_V1 . '/breeds');
        $response = collect($response->json());
        return $response->map(function ($item, $key) {
            return [...$item, "animal_type" => 'dog'];
        });
    }

    public function getDogs()
    {
        return self::getDogsApiData();
    }

    public function getSpecificBreed($breed)
    {
        $response = Http::get(self::DOG_API_URL_V1 . "/breeds/" . $breed);
        return $response->json();
    }

    public function getDogImages($image)
    {
        $response = Http::get(self::DOG_API_URL_V1 . "/images/" . $image);
        return $response->json();
    }
}
