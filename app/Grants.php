<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Grants extends Model
{
//public $timestamps = false;
	protected $table = 'app_grant';
    protected $fillable = [
        'id','name','amount','start_date','end_date','elibility_req','web_link','org_id','com_name','is_active',
    ];
}
