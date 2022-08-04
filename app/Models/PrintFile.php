<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
        'file_id',
        'name',
        'original_name',
        'num_of_pages',
        'num_of_copies',
        'recto_verso',
        'black_white',
        'color',
        'is_downloaded',
        'total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function shop()
    {
        return $this->belongsTo(User::class, 'shop_id');
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }
    public function amounts()
    {
        return $this->hasMany(amount::class);
    }
}
