<?php

namespace ProChile;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;


    /**
     * @param string $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }
}
