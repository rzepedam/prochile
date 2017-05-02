<?php

namespace ProChile;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'name'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo(Company::class);
    }
}
