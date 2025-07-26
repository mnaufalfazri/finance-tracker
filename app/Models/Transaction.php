<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','title', 'amount', 'type', 'description', 'date'];

    // relasi jika ingin menampilkan user pemilik transaksi
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
