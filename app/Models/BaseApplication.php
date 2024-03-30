<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseApplication extends Model
{
    protected $guarded = ['id'];
    protected $table = 'base_application';
    use HasFactory;
}
