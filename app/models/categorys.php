<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categorys extends Model
{
    use SoftDeletes;
    protected $table = "categorys";
    protected $primaryKey = 'CateID';


}
