<?php

namespace CodeFlix\Models;

use Bootstrapper\Interfaces\TableInterface;
use CodeFlix\Media\SeriePaths;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Serie.
 *
 * @package namespace CodeFlix\Models;
 */
class Serie extends Model implements TableInterface
{

    use SeriePaths;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description'];

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['#', 'Título', 'Descrição'];
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
            case 'Título':
                return $this->title;
            case 'Descrição':
                return $this->description;
        }
    }
}
