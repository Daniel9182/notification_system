<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rel_notification_images extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'notifications_id',
        'images_id'
    ];
}
