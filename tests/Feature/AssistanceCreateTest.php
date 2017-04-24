<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AssistanceCreateTest extends TestCase
{
    use DatabaseTransactions;

    protected $company;

    protected $industry;

    public function setUp()
    {
        parent::setUp();
        $this->company  = factory('ProChile\Company')->create();
        $this->industry = factory('ProChile\Industry')->create();
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
    function an_authenticated_user_may_create_assistances()
    {
        $this->signIn();

        $data = [
            'first_name'     => 'Raúl',
            'male_surname'   => 'Meza',
            'female_surname' => 'Mora',
            'rut'            => '17.032.680-6',
            'company_id'     => $this->company->id,
            'industry_id'    => $this->industry->id,
            'phone'          => '+56930972340',
            'email'          => 'rauleliasmezamora@gmail.com'
        ];

        $this->post('/assistances', $data)
            ->assertExactJson(['status' => true]);

        $this->assertDatabaseHas('assistances', [
            'user_id'        => auth()->id(),
            'first_name'     => 'Raúl',
            'male_surname'   => 'Meza',
            'female_surname' => 'Mora',
            'rut'            => '17032680-6',
            'company_id'     => $this->company->id,
            'industry_id'    => $this->industry->id,
            'phone'          => '+56930972340',
            'email'          => 'rauleliasmezamora@gmail.com'
        ]);
    }

    function createAssistance($overrides = [])
    {
        $this->signIn();
        $assistance = factory('ProChile\Assistance')->make($overrides);

        return $this->post('/assistances', $assistance->toArray());
    }

    /** @test */
    function a_client_require_a_male_surname()
    {
        $this->createAssistance(['male_surname' => null])
            ->assertSessionHasErrors('male_surname');
    }

    /** @test */
    function a_client_require_a_female_surname()
    {
        $this->createAssistance(['female_surname' => null])
            ->assertSessionHasErrors('female_surname');
    }

    /** @test */
    function a_client_require_a_first_name()
    {
        $this->createAssistance(['first_name' => null])
            ->assertSessionHasErrors('first_name');
    }

    /** @test */
    function a_client_require_a_rut()
    {
        $this->createAssistance(['rut' => null])
            ->assertSessionHasErrors('rut');
    }

    /** @test */
    function a_client_not_store_a_duplicate_rut()
    {
        $this->createAssistance(['rut' => '17.032.680-6']);

        $this->createAssistance(['rut' => '17.032.680-6'])
            ->assertSessionHasErrors('rut');
    }

    /** @test */
    function a_client_store_a_company_id_valid()
    {
        $this->createAssistance(['company_id' => factory('ProChile\Company')->create()->id]);

        $this->createAssistance(['company_id' => 9999])
            ->assertSessionHasErrors('company_id');
    }

    /** @test */
    function a_client_store_a_industry_id_valid()
    {
        $this->createAssistance(['industry_id' => factory('ProChile\Company')->create()->id]);

        $this->createAssistance(['industry_id' => 9999])
            ->assertSessionHasErrors('industry_id');
    }

    /** @test */
    function a_client_require_a_email()
    {
        $this->createAssistance(['email' => null])
            ->assertSessionHasErrors('email');
    }

    /** @test */
    function a_client_require_a_valid_email()
    {
        $this->createAssistance(['email' => 'rzpn@'])
            ->assertSessionHasErrors('email');
    }

    /** @test */
    function a_client_require_a_phone()
    {
        $this->createAssistance(['phone' => null])
            ->assertSessionHasErrors('phone');
    }
}
