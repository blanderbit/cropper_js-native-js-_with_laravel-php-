<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Creative extends Model
{
    protected $table = 'creatives';

    protected $fillable = [
        'image', 'original_image',
        'start_position_x','start_position_y',
        'name',
        'width', 'height',
        'description', 'teg',
        'aspectRatio',
        'category_id',
        'type_id'

    ];
    protected $with = ['tags'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageSrcAttribute()
    {
//        return "http://dev1.257.systems.s3-website-us-east-1.amazonaws.com/creatives/new/{$this->image}";
    }

    public function getImageThumbAttribute()
    {
//        return "http://dev1.257.systems.s3-website-us-east-1.amazonaws.com/creatives/new/{$this->original_image}";

    }

    public function getSrcAttribute()
    {
//        return "http://dev1.257.systems.s3-website-us-east-1.amazonaws.com/creatives/old/{$this->image}";
    }

    public function tags()
    {
        return $this->belongsToMany(
            'App\Models\Tag',
            'creative_tags',
            'creative_tags_id',
            'tag_id'
        );
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
