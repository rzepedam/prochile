<?php

namespace ProChile;

use ProChile\Http\Helpers\Helper;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Assistance extends Model
{
    use Notifiable, HasApiTokens;

    /**
     * @var array
     */
    protected $fillable   = [
        'user_id', 'type_assistance_id', 'city_id', 'company_id', 'industry_id', 'first_name',
        'male_surname', 'female_surname', 'country_id', 'rut', 'phone', 'email', 'photo'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeAssistance()
    {
        return $this->belongsTo(TypeAssistance::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
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

    /**
     * @return string 'Alfonso Romero López'
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->male_surname . ' ' . $this->female_surname;
    }
}
