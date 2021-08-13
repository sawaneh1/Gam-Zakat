<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mosque extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'imam_name',
        'location',
        'phone'
    ];    

    
}