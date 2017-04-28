<?php

namespace ProChile;

use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    /**
     * @var array
     */
    protected $fillable   = [
        'user_id', 'position_id', 'type_assistance_id', 'city_id', 'country_id', 'first_name',
        'male_surname', 'female_surname', 'rut', 'company_id', 'industry_id', 'phone', 'email',
        'photo'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;


    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function typeAssistance()
    {
        return $this->belongsTo(TypeAssistance::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @param $value
     */
    public function setRutAttribute($value)
    {
        $this->attributes['rut'] = str_replace('.', '', $value);
    }
}
