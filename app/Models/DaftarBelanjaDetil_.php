<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class DaftarBelanjaDetil extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'DaftarBelanjaDetil';
    
    // protected $fillable = [
    //     'carcompany', 'model','price'
    // ];
}
