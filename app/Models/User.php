<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function channel() {
        $this->hasMany('App\Models\Channel','userId','id');
    }

    public function permission() {
        return $this->belongsToMany(\App\Models\Permission::class, 'user_per');
    }

    // public function hasAccess(array $permissions) {
    //     foreach ($this->roles as $role) {
    //         if($role->hasAccess($permissions)) {
    //             return true;
    //         }
    //     }
    //     return false;
    // }

        /**
     * Checks if the user belongs to role.
     */
    public function hasRole(string $permiss) {
        $per = $this->permission()->first();
        return $per->perDetail
        ->where('action_code',$permiss)
        ->where('check_action',1)->first() ?? null;
    }
}
