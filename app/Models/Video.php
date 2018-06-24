<?php

namespace CodeFlix\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Video.
 *
 * @package namespace CodeFlix\Models;
 */
class Video extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];


    //muitos para um
    public function serie(){
        return $this->belongsTo(Serie::class);
    }

    //muitos para muitos
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}

