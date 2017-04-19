<?php

namespace ProChile\Http\Requests;

use Illuminate\Routing\Route;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
                return [
                    'male_surname'   => ['required'],
                    'female_surname' => ['required'],
                    'first_name'     => ['required'],
                    'rut'            => ['required', 'unique:clients,rut'],
                    'company_id'     => ['required', 'exists:companies,id'],
                    'industry_id'    => ['required', 'exists:industries,id'],
                    'phone'          => ['required'],
                    'email'          => ['required', 'email']
                ];
            }

            case 'PUT':
            {
                return [
                    'male_surname'   => ['required'],
                    'female_surname' => ['required'],
                    'first_name'     => ['required'],
                    'rut'            => ['required', 'unique:clients,rut,' . $this->route->parameter('client')],
                    'company_id'     => ['required', 'exists:companies,id'],
                    'industry_id'    => ['required', 'exists:industries,id'],
                    'phone'          => ['required'],
                    'email'          => ['required', 'email', 'unique:clients,email,' . $this->route->parameter('client')]
                ];
            }
        }
    }
}
