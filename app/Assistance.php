<?php

namespace ProChile;

use Illuminate\Database\Eloquent\Model;
use ProChile\Http\Helpers\Helper;

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
     * @param string $value
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    /**
     * @param string $value
     */
    public function setMaleSurnameAttribute($value)
    {
        $this->attributes['male_surname'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    /**
     * @param string $value
     */
    public function setFemaleSurnameAttribute($value)
    {
        $this->attributes['female_surname'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    /**
     * @param $value
     */
    public function setRutAttribute($value)
    {
        $this->attributes['rut'] = str_replace('.', '', $value);
    }

    /**
     * @param $value '16356109-3'
     *
     * @return string '16.356.109-3'
     */
    public function getRutAttribute($value)
    {
        return Helper::rut($value);
    }
}
