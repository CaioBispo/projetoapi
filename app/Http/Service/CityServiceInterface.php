<?php
/**
 * Created by PhpStorm.
 * User: caiob
 * Date: 26/11/2019
 * Time: 22:51
 */

namespace App\Http\Service;


use App\Http\DTO\CityDTO;
use App\Http\Repository\CityRepositoryInterface;

interface CityServiceInterface
{

    public function __construct(CityRepositoryInterface $cityRepository, CityDTO $cityDTO);

    public function getAll();

    public function get($id);

    public function store(array $data);

    public function update($id, array $data);

    public function destroy($id);

}