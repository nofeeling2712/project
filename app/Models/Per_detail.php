<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Per_detail extends Model
{
    protected $table = "per_detail";
    protected $fillable = [
    	'id',
        'id_per',
        'action_name',
        'action_code'
    ];
    public function permissionModel() {
    	return $this->belongsTo('App\Models\Permission','id_per','id');
    }
}
