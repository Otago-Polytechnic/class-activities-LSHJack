<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lecturer extends Model
{
    use HasFactory;
    protected $fillable = ['lid', 'firstname', 'lastname', 'email', 'address', 'salary', 'qualification'];
}
