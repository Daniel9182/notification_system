<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class rel_notification_type extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'notification_id',
        'type_id',
    ];
}
