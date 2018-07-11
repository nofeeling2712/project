<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = "permission";
    protected $fillable = [
    	'id',
        'name_per'
    ];

    public function perDetail() {
    	return $this->hasMany('App\Models\Per_detail', 'id_per', 'id');
    }

    public function user() {
        return $this->belongsToMany(\App\Models\User::class, 'user_per');
    }
}
