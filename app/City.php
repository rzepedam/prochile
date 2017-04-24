<?php

namespace ProChile;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * @var array
     */
    protected $fillable   = ['name'];

    /**
     * @var bool
     */
    public $timestamps = false;
}
