<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoostingClicks extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function clicker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
