<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class categorys extends Model
{
    protected $table = "categorys";
    protected $primaryKey = 'CateID';

    public $timestamps = false;
}
