<?php
/**
 * Created by PhpStorm.
 * User: caiob
 * Date: 26/11/2019
 * Time: 22:11
 */

namespace App\Http\Repository;


use App\Http\Models\CityModels;
use Illuminate\Support\Facades\DB;

class CityRepository implements CityRepositoryInterface
{
    private $cityModels;

    public function __construct(CityModels $cityModels)
    {
        $this->cityModels = $cityModels;
    }
    public function getAll()
    {
        return $this->cityModels->all();
    }
    public function get($wantedCity)
    {
        $city = DB::table('city')->where('name', '=' , $wantedCity)->first();
        return $city;
    }
    public function store(CityModels $city)
    {
        return json_encode($this->cityModels->create(json_decode($city, true)));
    }
    public function update($id, array $data)
    {
        return $this->cityModels->find($id)->update($data);
    }
    public function destroy($id)
    {
        return $this->cityModels->find($id)->delete();
    }

}