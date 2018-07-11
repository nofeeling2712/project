<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Channel;

class Item extends Model
{
    protected $table = "items";
    protected $fillable = [
        'title', 'desa', 'desimg','desplaintext','pubDate','link','guid',
        'slash','channelId',
    ];
    
        public function Channel(){
    	return $this->belongsTo('App\Models\Channel','channelId','id');
    }
}
