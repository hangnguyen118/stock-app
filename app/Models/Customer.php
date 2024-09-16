<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'country',
        'birthday',
        'biography',
        'credit_balance'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'create_at' => 'datetime',
            'update_at' => 'datetime',
        ];
    }
    public function favourites()
    {
        return $this->belongsToMany(Art::class, 'favourites', 'customers_id', 'arts_id');
    }

    public function galleries() 
    {
        return $this->hasMany(Gallery::class, 'customers_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'customers_id');
    }
}
