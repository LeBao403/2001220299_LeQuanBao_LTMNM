<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    // Mối quan hệ nhiều-mối quan hệ (Many-to-Many) với Course
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
