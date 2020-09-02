<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class AppFavGrant extends Model
{
//public $timestamps = false;
    protected $table = 'app_fav_grant';
    public $timestamps = false;

    protected $fillable = [
        'user_id','grant_id','fav_dt'
    ];


    function getGrants() {
        return $this->hasMany('App\Grants', 'id','grant_id');
    }
}
