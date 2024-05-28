<?php
namespace App\Models;
use App\Models\Konten;
use App\Models\Travel;
use App\Models\Artikel;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'telf',
    ];

    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'id_user');
    }

    public function konten()
    {
        return $this->hasMany(Konten::class, 'id_user');
    }
    public function travel()
    {
        return $this->hasMany(Travel::class, 'id_user');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
