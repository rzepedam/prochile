<?php

namespace ProChile;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'male_surname', 'female_surname', 'rut', 'company_id', 'industry_id', 'phone',
        'email'
    ];

    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function setRutAttribute($value)
    {
        $this->attributes['rut'] = str_replace('.', '', $value);
    }
}
