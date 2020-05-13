<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'ProCode','ProName','ProSlug','ProPrice','ProFeatured','ProStatus','ProInfo','ProImg','CateID'
    ];
    protected $primaryKey = 'ProID';
    public function categorys()
    {
        return $this->belongsTo('App\models\categorys', 'CateID', 'CateID');
    }
    public function size()
    {
        return $this->belongsToMany('App\models\size','product_size','ProID','SizeID');
    }

}
