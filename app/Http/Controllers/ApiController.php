<?php
/**
 * Created by PhpStorm.
 * User: caiob
 * Date: 26/11/2019
 * Time: 00:00
 */

namespace App\Http\Controllers;

use App\Http\Service\CityServiceInterface;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;
use mysql_xdevapi\Exception;

class ApiController extends BaseController
{

    private $cityService;

    public function __construct(CityServiceInterface $cityService){
        $this->cityService = $cityService;
    }

    public function getByCity(string $wantedCity){

        try{
            $city = $this->cityService->get($wantedCity);

            if(isset($city)){
                return response()->json($city, Response::HTTP_OK);
            }else{
                $json_file = file_get_contents('http://api.openweathermap.org/data/2.5/forecast?q='.$wantedCity
                    .',br&units=metric&mode=json&appid=56c03479866487fa794a1047fbb8a684&lang=pt');
            }

            $jsonObj = json_decode($json_file, true);

            return response()->json(json_decode($this->cityService->store($jsonObj), true), Response::HTTP_OK);

        }catch (\Exception $e){
            return response()->json(['error' => 'Cidade não encontrada'], Response::HTTP_NOT_FOUND);
        }
    }
//
    public function getAll(){
        try{
            return response()->json($this->cityService->getAll(), Response::HTTP_OK);
        }catch (Exception $e){
            return response()->json(['error' => 'Cidade não encontrada'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id){
        try{
            response()->json($this->cityService->destroy($id), Response::HTTP_OK);
            return response()->json(['Sucesso' => 'Registro Deletado'], Response::HTTP_OK);
        }catch (Exception $e){
            return response()->json(['error' => 'Cidade não encontrada'], Response::HTTP_NOT_FOUND);
        }
    }
}
