<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    public function types()
    {
        return $this->belongsToMany(types::class,'rel_user_types');
    }

    public function notifications()
    {
        return $this->belongsToMany(notification_types::class,'rel_user_notifications');
    }
    
}
