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
                $rules = [
                    'position_id'    => ['required', 'exists:positions,id'],
                    'city_id'        => ['required', 'exists:cities,id'],
                    'company_id'     => ['required', 'exists:companies,id'],
                    'industry_id'    => ['required', 'exists:industries,id'],
                    'rut'            => ['required', 'unique:assistances,rut'],
                    'male_surname'   => ['required'],
                    'female_surname' => ['required'],
                    'first_name'     => ['required'],
                    'country_id'     => ['required', 'exists:countries,id'],
                    'phone'          => ['required'],
                    'email'          => ['required', 'email', 'unique:assistances,email']
                ];

                if ( \Request::get('position_id') == 1 )
                {
                    $rules['type_assistance_id'] = ['required', 'in:1,2,3'];
                } else
                {
                    $rules['type_assistance_id'] = ['nullable', 'in:null'];
                }

                return $rules;
            }

            case 'PUT':
            {
                return [
                    'company_id'     => ['required', 'exists:companies,id'],
                    'industry_id'    => ['required', 'exists:industries,id'],
                    'rut'            => ['required', 'unique:assistances,rut,' . $this->route->parameter('assistance')],
                    'male_surname'   => ['required'],
                    'female_surname' => ['required'],
                    'first_name'     => ['required'],
                    'country_id'     => ['required', 'exists:countries,id'],
                    'phone'          => ['required'],
                    'email'          => ['required', 'email', 'unique:assistances,email,' . $this->route->parameter('assistance')]
                ];
            }
        }
    }
}
