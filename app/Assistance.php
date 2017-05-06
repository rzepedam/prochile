<?php

namespace ProChile;

use ProChile\Http\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Assistance extends Model
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable   = [
        'user_id', 'type_assistance_id', 'city_id', 'company_id', 'industry_id', 'first_name',
        'male_surname', 'female_surname', 'country_id', 'rut', 'phone', 'email'
    ];

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
     * Route notifications for the Nexmo channel.
     *
     * @return string
     */
    public function routeNotificationForNexmo()
    {
        return $this->phone;
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
     * @param $value 'raulMeZa@controlQTime.cl'
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
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
