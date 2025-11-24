<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    // Mối quan hệ nhiều-mối quan hệ (Many-to-Many) với Student
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
