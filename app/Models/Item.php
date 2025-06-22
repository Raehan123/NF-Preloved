<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'user_id',
        'username',
        'no_telp',
        'instagram',
        'notes',
        'title',
        'description',
        'image',
        'category',
        'price',
        'is_sold',
    ];

    /**
     * Relasi ke model User (setiap item dimiliki oleh satu user)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wishedByUsers()
{
    return $this->belongsToMany(User::class, 'wishlists')->withTimestamps();
}
}
