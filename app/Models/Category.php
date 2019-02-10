<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title'];

    public function Creative()
    {
        return $this->hasMany(Creative::class);
    }

}
