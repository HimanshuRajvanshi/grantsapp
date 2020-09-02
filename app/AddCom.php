<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class AddCom extends Model
{   
//public $timestamps = false;
	protected $table = 'app_organization';
    protected $fillable = [
        'name','description','website','is_active','created_at','created_ip',
    ];
}
