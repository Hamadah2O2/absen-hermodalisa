<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $table = 'absen';

    protected $fillable = [
        'user_id',
        'tanggal_absen',
        'status',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
