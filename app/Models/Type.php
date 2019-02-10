<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'title'
    ];

    public function CreativeType()
    {
        return $this->belongsToMany(
            Creative::class,
            'creative_types',
            'type_id',
            'creative_types_id'
        );
    }
}
