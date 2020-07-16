<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'OrderID';
    public function products()
    {
        return $this->belongsToMany('App\models\products', 'order_product', 'OrderID', 'ProID')->withPivot(['OrdQuantity','OrdSize'])->withTrashed();
    }
    public function order_product()
    {
        return $this->hasMany('App\models\order_product', 'OrderID', 'OrderID');
    }


}
