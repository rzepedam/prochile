<?php

namespace ProChile\Http\Requests;

use Illuminate\Routing\Route;
use Illuminate\Foundation\Http\FormRequest;

class AssistanceRequest extends FormRequest
{
    /**
     * @var Route
     */
    protected $route;

    /**
     * ClientRequest constructor.
     *
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->route = $route;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function all()
    {
        $attributes        = parent::all();
        $attributes['rut'] = str_replace('.', '', $attributes['rut']);

        return $attributes;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ( $this->method() )
        {
            case 'POST':
            {
                return [
                    'type_assistance_id' => ['required', 'in:1,2,3'],
                    'city_id'            => ['required', 'exists:cities,id'],
                    'company_id'         => ['required', 'exists:companies,id'],
                    'industry_id'        => ['required', 'exists:industries,id'],
                    'rut'                => ['required', 'unique:assistances,rut'],
                    'first_name'         => ['required'],
                    'male_surname'       => ['required'],
                    'female_surname'     => ['required'],
                    'country_id'         => ['required', 'exists:countries,id'],
                    'phone'              => ['required'],
                    'email'              => ['required', 'email', 'unique:assistances,email']
                ];
            }

            case 'PUT':
            {
                return [
                    'type_assistance_id' => ['required', 'in:1,2,3'],
                    'city_id'            => ['required', 'exists:cities,id'],
                    'company_id'         => ['required', 'exists:companies,id'],
                    'industry_id'        => ['required', 'exists:industries,id'],
                    'rut'                => ['required', 'unique:assistances,rut,' . $this->route->parameter('assistance')],
                    'first_name'         => ['required'],
                    'male_surname'       => ['required'],
                    'female_surname'     => ['required'],
                    'country_id'         => ['required', 'exists:countries,id'],
                    'phone'              => ['required'],
                    'email'              => ['required', 'email', 'unique:assistances,email,' . $this->route->parameter('assistance')]
                ];
            }
        }
    }
}
