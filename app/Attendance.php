<?php

namespace ProChile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable   = [
        'assistance_id', 'rut', 'created_at'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $dates = [
        'created_at', 'deleted_at'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assistance()
    {
        return $this->belongsTo(Assistance::class);
    }


    /**
     * @return mixed '23-09-2001'
     */
    public function getDateAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }

    /**
     * @return mixed '11:27:09'
     */
    public function getHourAttribute()
    {
        return $this->created_at->format('h:i:s');
    }
}
