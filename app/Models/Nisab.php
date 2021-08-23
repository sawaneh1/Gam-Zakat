<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nisab extends Model
{
    use HasFactory;
    protected $fillable = [
        'nisab', 
        'statement'
    ];    
}