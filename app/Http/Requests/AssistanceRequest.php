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
        return [
            'company_id'         => ['required', 'exists:companies,id'],
            'industry_id'        => ['required', 'exists:industries,id'],
            'rut'                => ['required', 'unique:assistances,rut'],
            'first_name'         => ['required'],
            'male_surname'       => ['required'],
            'female_surname'     => ['required'],
            'is_male'            => ['required', 'in:0,1'],
            'country_id'         => ['required', 'exists:countries,id'],
            'phone'              => ['required'],
            'email'              => ['required', 'email', 'unique:assistances,email']
        ];
    }
}
