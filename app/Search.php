<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Search extends Model
{
    protected $table = 'names';
    use Searchable;  

     /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'names_index';
    }

/**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        //return $array;

        return [
        'name' => $this->name];
    }
}
