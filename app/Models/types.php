<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class types extends Model
{
    use HasFactory;
    
    public function types()
    {
        return $this->belongsToMany(user::class,'rel_user_type');
    }

}
