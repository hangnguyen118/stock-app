<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'galleries_id',
        'title',
        'description',
        'price',
        'display',
        'watemark',
        'dowload',
        'view',
        'like',
        'favourites',
        'comment',
        'url_cover_image',
        'url_preview_image'
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
    public function favouritedBy()
    {
        return $this->belongsToMany(Customer::class, 'favourites', 'arts_id', 'customers_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'arts_id');
    }
    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'galleries_id');
    }    
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'art_tag', 'arts_id', 'tags_id');
    }
    public function lables()
    {
        return $this->belongsToMany(Lable::class, 'art_lable', 'arts_id', 'lables_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'arts_id');
    }
}
