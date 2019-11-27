<?php
/**
 * Created by PhpStorm.
 * User: caiob
 * Date: 26/11/2019
 * Time: 22:41
 */

namespace App\Http\Service;


use App\Http\DTO\CityDTO;
use App\Http\Models\CityModels;
use App\Http\Repository\CityRepositoryInterface;

class CityService implements CityServiceInterface
{

    private $cityRepository;
    private $cityDTO;

    public function __construct(CityRepositoryInterface $cityRepository, CityDTO $cityDTO)
    {
        $this->cityRepository = $cityRepository;
        $this->cityDTO = $cityDTO;
    }



    public function store(array $data){
       $city = $this->cityDTO->convertCityJsonDTO($data);
       return $this->cityRepository->store($city);
    }


    public function getAll(){
        return $this->cityRepository->getAll();
    }

    public function get($city){
        return $this->cityRepository->get($city);
    }

    public function update($id, array $data){}

    public function destroy($id){
        return $this->cityRepository->destroy($id);
    }
}