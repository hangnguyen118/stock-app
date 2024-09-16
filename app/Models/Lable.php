<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lable extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lable_name',
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
    public function arts()
    {
        return $this->belongsToMany(Art::class, 'art_lable', 'lables_id', 'arts_id');
    }
}
