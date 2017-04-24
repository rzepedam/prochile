<?php

namespace ProChile;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @var bool
     */
    public $timestamps = false;

}
