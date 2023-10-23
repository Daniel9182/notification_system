<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifications extends Model
{
    use HasFactory;
    
    public function users()
    {
        return $this->belongsToMany(user::class,'rel_user_notification');
    }

    
    public function types()
    {
        return $this->belongsToMany(notification_types::class,'rel_notification_types');
    }
    
    public function images()
    {
        return $this->belongsToMany(images::class,'rel_notification_images');
    }

}
