<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class DaftarBelanja extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'DaftarBelanja';
    
    // protected $fillable = [
    //     'carcompany', 'model','price'
    // ];
}
