<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class product_size extends Model
{
    protected $table = 'product_size';
    protected $primaryKey = ['SizeID','ProID'];

    public $timestamps = false;
    protected $fillable=['SizeID','ProID'];
}
