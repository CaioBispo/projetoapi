<?php
/**
 * Created by PhpStorm.
 * User: caiob
 * Date: 26/11/2019
 * Time: 22:18
 */

namespace App\Http\Repository;


use App\Http\Models\CityModels;

interface CityRepositoryInterface
{

    public function __construct(CityModels $cityModels);

    public function getAll();

    public function get($name);

    public function store(CityModels $data);

    public function update($id, array $data);

    public function destroy($id);

}