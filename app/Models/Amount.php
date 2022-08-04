<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amount extends Model
{
    use HasFactory;
    protected $fillable = [
        'print_file_id',
        'user_id',
        'deduct_money',
        'add_money',
        'shop_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function printFiles()
    {
        return $this->belongsTo(PrintFile::class);
    }
}
