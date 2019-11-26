<?php
/**
 * Created by PhpStorm.
 * User: caiob
 * Date: 26/11/2019
 * Time: 00:00
 */

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

define("URL", "http://api.openweathermap.org/data/2.5/forecast?i=");
define('LANGUAGE','lang=pt');
define('UNIT',',br&units=metric');
define('RETURN_TYPE','&mode=json');
define('API_ID','&appid=56c03479866487fa794a1047fbb8a684');
class ApiController extends BaseController
{

    public function __construct(){}

    public function getByCity(string $city){

        $json_file = file_get_contents('http://api.openweathermap.org/data/2.5/forecast?q='.$city.',br&units=metric&mode=json&appid=56c03479866487fa794a1047fbb8a684&lang=pt');

        $json_str = json_decode($json_file, true);

        if($json_str['cod'] == 200){
            return $json_str['city.name'];
        }

    }
//
    public function teste($id){
        return $id;
    }
}
