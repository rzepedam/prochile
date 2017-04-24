<?php

namespace ProChile;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name'];
}
