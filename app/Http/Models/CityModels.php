<?php
/**
 * Created by PhpStorm.
 * User: caiob
 * Date: 26/11/2019
 * Time: 01:55
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class CityModels extends Model
{
    protected $table = 'city';

    protected $fillable = [
        'name',
        'wind',
        'temp',
        'rain',
        'time',
        'cloud'
    ];
}

