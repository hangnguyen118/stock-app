<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customers_id',
        'arts_id',
        'content',
        'like',
        'type'
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
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }

    public function art()
    {
        return $this->belongsTo(Art::class, 'arts_id');
    }
}
