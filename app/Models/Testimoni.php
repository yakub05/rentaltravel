<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'testimoni';

    protected $fillable = [
        'id_user',
        'komentar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
