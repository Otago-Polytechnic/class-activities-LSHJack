<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enrolment extends Model
{
    use HasFactory;
    protected $fillable = ['block', 'mark'];

    public function students() {
        return $this->hasMany(Student::class);
        //This is an example of a relationship - an institution can have many students
    }

    public function lecturers() {
        return $this->hasMany(Lecturer::class);
        //This is an example of a relationship - an institution can have many lecturers
    }

    public function modules() {
        return $this->hasMany(Module::class);
        //This is an example of a relationship - an institution can have many modules
    }

    public function enrolments() {
        return $this->hasMany(Enrolment::class);
        //This is an example of a relationship - an institution can have many enrolments
    }
}
