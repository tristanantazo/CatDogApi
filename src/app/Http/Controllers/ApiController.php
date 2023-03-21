<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\CatService;
use App\Services\DogService;
use App\Services\AnimalService;

class ApiController extends Controller
{
    public $animalService;
    public $catService;
    public $dogService;

    public function __construct(
        AnimalService $animalService,
        CatService $catService,
        DogService $dogService,
    ) {
        $this->animalService = $animalService;
        $this->catService = $catService;
        $this->dogService = $dogService;
    }

    public function getBreeds(Request $request)
    {
        $response = $this->animalService->getBreedCatsandDogs($request->page, $request->limit);
        return response()->json($response);
    }

    public function getCatBreed(Request $request)
    {
        if ($request->breed == null) {
            $response = $this->animalService->paginate($request->page, $request->limit, $this->catService->getCats());
            return response()->json($response);
        } else {
            $response = $this->catService->getSpecificBreed($request->breed);
            return response()->json($response);
        }
    }

    public function getDogBreed(Request $request)
    {
        if ($request->breed == null) {
            $response = $this->animalService->paginate($request->page, $request->limit, $this->dogService->getDogs());
            return response()->json($response);
        } else {
            $response = $this->dogService->getSpecificBreed($request->breed);
            return response()->json($response);
        }
    }

    public function getDogImages(Request $request)
    {
        $response = $this->dogService->getDogImages($request->image_id);
        return response()->json($response);
    }

    public function getCatImages(Request $request)
    {
        $response = $this->catService->getCatImages($request->image_id);
        return response()->json($response);
    }
}
