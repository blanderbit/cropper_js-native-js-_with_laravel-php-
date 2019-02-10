<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'title'
    ];

    public function CreativeTag()
    {
        return $this->belongsToMany(
            Creative::class,
            'creative_tags',
            'tag_id',
            'creative_tags_id'
        );
    }
}
