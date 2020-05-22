<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    protected $table = 'feedback';

    protected $primaryKey = 'FeedID';

    public function user()
    {
        return $this->belongsTo('App\User', 'UserId', 'id');
    }
}
