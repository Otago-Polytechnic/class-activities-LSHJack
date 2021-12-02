<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lecturer extends Model
{
    protected $fillable = ['firstname', 'lastname', 'email', 'address', 'salary', 'qualification'];
}
