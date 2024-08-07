<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students'; // Nama tabel yang digunakan di database
    protected $primaryKey = 'id'; // Primary key dari tabel
    protected $fillable = ['img','name', 'gender', 'classroom_id', 'religion', 'address']; // Kolom yang dapat diisi secara massal

    // Definisikan relasi ke model Classroom
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
