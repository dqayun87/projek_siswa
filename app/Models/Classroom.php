<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $table = 'classrooms'; // Nama tabel yang digunakan di database
    protected $primaryKey = 'id'; // Primary key dari tabel
    protected $fillable = ['name']; // Kolom yang dapat diisi secara massal

    // Definisikan relasi ke model Student
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}

