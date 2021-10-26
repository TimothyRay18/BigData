<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelBelanja extends Model
{
    protected $table = 'daftarbelanja';
    protected $primarykey = 'id';
    public $timestamps = false;
}
