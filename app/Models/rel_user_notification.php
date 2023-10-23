<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class rel_user_notification extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'notifications_types_id',
        'user_id',
    ];
}
