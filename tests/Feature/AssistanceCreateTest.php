<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AssistanceCreateTest extends TestCase
{
    use DatabaseTransactions;

    protected $city;

    protected $company;

    protected $country;

    protected $industry;

    protected $position;

    protected $typeAssistance;

    public function setUp()
    {
        parent::setUp();
        $this->city           = factory('ProChile\City')->create();
        $this->country        = factory('ProChile\Country')->create();
        $this->company        = factory('ProChile\Company')->create();
        $this->industry       = factory('ProChile\Industry')->create();
        $this->position       = factory('ProChile\Position')->create();
        $this->typeAssistance = factory('ProChile\TypeAssistance')->create();
    }

    /** @test */
    function a_guests_user_may_not_access_create_assistances()
    {
        $this->post('/assistances')
            ->assertRedirect('/login');

        $this->get('/assistances/create')
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_may_visit_create_assistance()
    {
        $this->signIn();

        $this->get('/assistances/create')
            ->assertSee('Crear Asistente')
            ->assertSee('Cargo')
            ->assertSee('Tipo Asistente')
            ->assertSee('Lugar Evento')
            ->assertSee('Empresa')
            ->assertSee('Sector Industrial')
            ->assertSee('Rut')
            ->assertSee('Primer Nombre')
            ->assertSee('Apellido Paterno')
            ->assertSee('Apellido Materno')
            ->assertSee('Nacionalidad')
            ->assertSee('Email')
            ->assertSee('Guardar')
            ->assertSee('Volver');
    }

    /** @test */
    function an_authenticated_user_may_create_assistances_when_position_is_1()
    {
        $this->signIn();
        $position       = factory('ProChile\Position')->create(['id' => 1]);
        $typeAssistance = factory('ProChile\TypeAssistance')->create(['id' => 1]);

        $data = [
            'position_id'        => $position->id,
            'type_assistance_id' => $typeAssistance->id,
            'city_id'            => $this->city->id,
            'company_id'         => $this->company->id,
            'industry_id'        => $this->industry->id,
            'first_name'         => 'Raúl',
            'male_surname'       => 'Meza',
            'female_surname'     => 'Mora',
            'rut'                => '17.032.680-6',
            'country_id'         => $this->country->id,
            'phone'              => '+56930972340',
            'email'              => 'raulmeza@controlqtime.cl'
        ];

        $this->post('/assistances', $data)
            ->assertExactJson(['status' => true]);

        $this->assertDatabaseHas('assistances', [
            'user_id'            => auth()->id(),
            'position_id'        => $position->id,
            'type_assistance_id' => $typeAssistance->id,
            'city_id'            => $this->city->id,
            'first_name'         => 'Raúl',
            'male_surname'       => 'Meza',
            'female_surname'     => 'Mora',
            'rut'                => '17032680-6',
            'company_id'         => $this->company->id,
            'industry_id'        => $this->industry->id,
            'country_id'         => $this->country->id,
            'phone'              => '+56930972340',
            'email'              => 'raulmeza@controlqtime.cl'])
            ->assertDatabaseHas('users', [
                'name'  => 'Raúl Meza',
                'email' => 'raulmeza@controlqtime.cl'
            ]);

    }

    /** @test */
    function an_authenticated_user_may_create_assistances_when_position_is_distinct_1()
    {
        $position = factory('ProChile\Position')->create(['id' => 99]);
        $this->signIn();

        $data = [
            'position_id'        => $position->id,
            'type_assistance_id' => '',
            'city_id'            => $this->city->id,
            'company_id'         => $this->company->id,
            'industry_id'        => $this->industry->id,
            'rut'                => '17.032.680-6',
            'first_name'         => 'Raúl',
            'male_surname'       => 'Meza',
            'female_surname'     => 'Mora',
            'country_id'         => $this->country->id,
            'phone'              => '+56930972340',
            'email'              => 'raulmeza@controlqtime.cl'
        ];

        $this->post('/assistances', $data)
            ->assertExactJson(['status' => true]);

        $this->assertDatabaseHas('assistances', [
            'user_id'            => auth()->id(),
            'position_id'        => $position->id,
            'type_assistance_id' => null,
            'city_id'            => $this->city->id,
            'company_id'         => $this->company->id,
            'industry_id'        => $this->industry->id,
            'rut'                => '17032680-6',
            'first_name'         => 'Raúl',
            'male_surname'       => 'Meza',
            'female_surname'     => 'Mora',
            'country_id'         => $this->country->id,
            'phone'              => '+56930972340',
            'email'              => 'raulmeza@controlqtime.cl'])
            ->assertDatabaseHas('users', [
                'name'  => 'Raúl Meza',
                'email' => 'raulmeza@controlqtime.cl'
            ]);

    }

    function createAssistance($overrides = [])
    {
        $this->signIn();
        $assistance = factory('ProChile\Assistance')->make($overrides);

        return $this->post('/assistances', $assistance->toArray());
    }

    /** @test */
    function a_assistance_store_a_position_id_valid()
    {
        $this->createAssistance(['position_id' => factory('ProChile\Position')->create()->id]);

        $this->createAssistance(['position_id' => 9999])
            ->assertSessionHasErrors('position_id');
    }

    /** @test */
    function a_assistance_require_a_type_assistance_valid_when_position_is_1()
    {
        $this->createAssistance([
            'position_id'        => factory('ProChile\Position')->create(['id' => 1])->id,
            'type_assistance_id' => factory('ProChile\TypeAssistance')->create(['id' => 4])->id
        ])->assertSessionHasErrors('type_assistance_id');
    }

    /** @test */
    function a_assistance_require_a_type_assistance_nullable_when_position_is_distinct_to_1()
    {
        $this->createAssistance([
            'position_id'        => factory('ProChile\Position')->create()->id,
            'type_assistance_id' => null
        ])->assertSessionMissing('type_assistance_id');
    }

    /** @test */
    function a_assistance_does_not_allowed_type_assistances_distinct_to_null_when_position_is_distinct_to_1()
    {
        $this->createAssistance([
            'position_id'        => factory('ProChile\Position')->create()->id,
            'type_assistance_id' => factory('ProChile\TypeAssistance')->create(['id' => 999])->id
        ])->assertSessionHasErrors('type_assistance_id');
    }

    /** @test */
    function a_assistance_store_a_city_id_valid()
    {
        $this->createAssistance(['city_id' => factory('ProChile\City')->create()->id]);

        $this->createAssistance(['city_id' => 9999])
            ->assertSessionHasErrors('city_id');
    }

    /** @test */
    function a_assistance_store_a_company_id_valid()
    {
        $this->createAssistance(['company_id' => factory('ProChile\Company')->create()->id]);

        $this->createAssistance(['company_id' => 9999])
            ->assertSessionHasErrors('company_id');
    }

    /** @test */
    function a_assistance_store_a_industry_id_valid()
    {
        $this->createAssistance(['industry_id' => factory('ProChile\Company')->create()->id]);

        $this->createAssistance(['industry_id' => 9999])
            ->assertSessionHasErrors('industry_id');
    }

    /** @test */
    function a_assistance_store_a_country_id_valid()
    {
        $this->createAssistance(['country_id' => factory('ProChile\Country')->create()->id]);

        $this->createAssistance(['country_id' => 9999])
            ->assertSessionHasErrors('country_id');
    }

    /** @test */
    function a_assistance_require_a_male_surname()
    {
        $this->createAssistance(['male_surname' => null])
            ->assertSessionHasErrors('male_surname');
    }

    /** @test */
    function a_assistance_require_a_female_surname()
    {
        $this->createAssistance(['female_surname' => null])
            ->assertSessionHasErrors('female_surname');
    }

    /** @test */
    function a_assistance_require_a_first_name()
    {
        $this->createAssistance(['first_name' => null])
            ->assertSessionHasErrors('first_name');
    }

    /** @test */
    function a_assistance_require_a_rut()
    {
        $this->createAssistance(['rut' => null])
            ->assertSessionHasErrors('rut');
    }

    /** @test */
    function a_assistance_not_store_a_duplicate_rut()
    {
        factory('ProChile\Assistance')->create(['rut' => '17.032.680-6']);

        $this->createAssistance(['rut' => '17.032.680-6'])
            ->assertSessionHasErrors('rut');
    }

    /** @test */
    function a_assistance_require_a_email()
    {
        $this->createAssistance(['email' => null])
            ->assertSessionHasErrors('email');
    }

    /** @test */
    function a_assistance_require_a_valid_email()
    {
        $this->createAssistance(['email' => 'rzpn@'])
            ->assertSessionHasErrors('email');
    }

    /** @test */
    function a_assistance_not_store_a_duplicate_email()
    {
        factory('ProChile\Assistance')->create(['email' => 'raulmeza@controlqtime.cl']);

        $this->createAssistance(['email' => 'raulmeza@controlqtime.cl'])
            ->assertSessionHasErrors('email');
    }

    /** @test */
    function a_assistance_require_a_phone()
    {
        $this->createAssistance(['phone' => null])
            ->assertSessionHasErrors('phone');
    }
}
