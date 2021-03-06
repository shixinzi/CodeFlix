<?php

namespace CodeFlix\Models;

use Bootstrapper\Interfaces\TableInterface;
use CodeFlix\Media\VideoPaths;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Video1.
 *
 * @package namespace CodeFlix\Models;
 */
class Video extends Model implements Transformable, TableInterface
{
    use TransformableTrait;
    use VideoPaths;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'duration', 'published', 'serie_id'
    ];

    protected $casts = [
      'completed' => 'boolean'
    ];

    //muitos para um
    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    //muitos para muitos
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['#'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
       switch ($header){
           case '#':
               return $this->id;
               break;
    }
    }
}

