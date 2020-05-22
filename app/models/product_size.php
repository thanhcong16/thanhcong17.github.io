<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class product_size extends Model
{
    protected $table = 'product_size';


    public $timestamps = false;
    protected $fillable=['SizeID','ProID'];
}
