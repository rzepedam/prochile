<?php

namespace ProChile;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
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
