<?php

namespace App\Services;

use App\Services\CatService;
use App\Services\DogService;

class AnimalService
{
    public $dogService;
    public $catService;

    public function __construct(
        CatService $catService,
        DogService $dogService
    ) {
        $this->catService = $catService;
        $this->dogService = $dogService;
    }

    public function getBreedCatsandDogs($currentPage, $dataLimitPerPage)
    {
        $cats = $this->catService->getCatsApiData();
        $dogs = $this->dogService->getDogsApiData();
        $newArray = collect(array_merge($cats->toArray(), $dogs->toArray()));

        return self::paginate($currentPage, $dataLimitPerPage, $newArray);
    }

    public function paginate($currentPage = 1, $dataLimitPerPage = 20, $newArray)
    {

        $newArray = $newArray->sortBy('name')->values();

        $dataCount = count($newArray);
        $newCurrentPage = $currentPage > 0 ? $currentPage - 1 : $currentPage;
        $totalPageCount = ceil($dataCount / $dataLimitPerPage);
        $startCount = ($newCurrentPage * $dataLimitPerPage);

        $formattedArray = collect([]);
        $i = 0;
        while ($i < $dataLimitPerPage) {
            $id = $startCount + $i;

            if ($id >= $dataCount) {
                break;
            }
            $formattedArray->push($newArray[$id]);
            $i += 1;
        }

        return [
            "page" => $currentPage,
            "limit" => $dataLimitPerPage,
            "total_page_count" => $totalPageCount,
            "results" => $formattedArray->sortBy('name')->values()
        ];
    }
}
