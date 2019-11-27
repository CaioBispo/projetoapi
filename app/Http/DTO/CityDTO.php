<?php
/**
 * Created by PhpStorm.
 * User: caiob
 * Date: 26/11/2019
 * Time: 22:22
 */

namespace App\Http\DTO;


use App\Http\Models\CityModels;
use PHPUnit\Util\Json;

class CityDTO
{

    public function convertCityJsonDTO($json): CityModels{

        $city = new CityModels();

        $city->name = $json['city']['name'];
        $city->wind = $json['list'][0]['wind']['speed'];
        $city->temp = $json['list'][0]['main']['temp'];
        $city->rain = $json['list'][0]['weather'][0]['description'];
        $city->time = $json['list'][0]['dt_txt'];
        $city->cloud = $json['list'][0]['clouds']['all'];

        return $city;
    }

    public function convertDTOCityJson(CityModels $city): Json{


        return json_encode($city);
    }

}