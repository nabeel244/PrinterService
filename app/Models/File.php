<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'original_name',
        'num_of_pages',
        'num_of_copies',
        'recto_verso',
        'black_white',
        'color',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function printFiles()
    {
        return $this->hasMany(PrintFile::class);
    }
}
