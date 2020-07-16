<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class products extends Model
{
    use SoftDeletes;
    protected $table = 'products';


    protected $primaryKey = 'ProID';
    protected $fillable=['ProCode','ProName','ProSlug','ProPrice','ProFeatured','ProStatus','ProInfo','ProImg','CateID'];
    public function categorys()
    {
        return $this->belongsTo('App\models\categorys', 'CateID', 'CateID')->withTrashed();
    }
    public function size()
    {
        return $this->belongsToMany('App\models\size','product_size','ProID','SizeID');
    }

}
