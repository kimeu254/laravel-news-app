<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'headline',
        'image',
        'story',
        'posted_by',
        'image_one',
        'story_one',
        'url',
        'story_two',
        'category_id',
        'region_id',
    ];

    public function name(){

        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function slug(){

        return $this->belongsTo(Region::class,'region_id','id');
    }
}
