<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{

    protected $fillable = [
        'badge_name',
        'icon'
    ];

    public function earners()
    {
        return $this->belongsToMany(User::class, 'badge_user', 'badge_id', 'user_id')->withTimestamps();
    }


}
