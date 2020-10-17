<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends LocalizedModel
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = ['email'];
}
