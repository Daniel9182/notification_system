<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification_types extends Model
{
    use HasFactory;

    public function notifications()
    {
        return $this->belongsToMany(notifications::class,'rel_notification_types');
    }

    
    public function users()
    {
        return $this->belongsToMany(users::class,'rel_user_notifications');
    }
}
