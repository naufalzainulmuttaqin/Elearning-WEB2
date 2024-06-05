<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    // mendeginisikan field yg blh diisi
    protected $fillable = ['name', 'nim', 'major', 'class', 'course_id'];
    /***8
    * Laravel Relasi
    * 1. one to one:
    * - hasOne() : digunakan pada mode yang menitipkan id
    * - balongTo() : digunakan pada model yang memiliki id dari tabel lain
    * 2. One to man:
    * - hasMany(): digunakan pada tabel yang menitipkan id
    * -balongsTomany() : digunakan pada tabel yang memiliki id dari tabel lain
    */ 
    // relasi ke model course (1 student memiliki 1 course / 1 to 1)
    public function course(){
        return $this->belongsTo(Courses::class);
    }
}
