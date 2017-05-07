<?php

namespace ProChile;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @var string
     */
    protected $fillable = [
        'acr', 'name'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

}
