<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'identifier',
        'name',
        'surname',
        'whatsapp_number',
        'mobile',
        'mobile_code',
        'address',
        'latitude',
        'longitude',
        'email',
        'user_type',
        'status',
        'password',
    ];

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
    ];
    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function printFiles()
    {
        return $this->hasMany(PrintFile::class);
    }
    public function amount()
    {
        return $this->hasMany(Amount::class);
    }

    public function rate()
    {
        return $this->hasOne(Rate::class);
    }
    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }
}
