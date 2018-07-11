<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Item;
class Channel extends Model
{
    protected $table = "channels";

        protected $fillable = [
        'title', 'description', 'urlImage','titleImage','linkImage','pubDate','generator',
        'link','userId',
    ];

    public function User() {
    	return $this->belongsTo('App\Models\User','userId','id');
    }
    
    public function Item() {
    	return $this->hasMany('App\Models\Item','channelId','id');
    }
}
