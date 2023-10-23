<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'url',
    ];
    
    public function notifications()
    {
        return $this->belongsToMany(notifications::class,'rel_notification_images');
    }
}
