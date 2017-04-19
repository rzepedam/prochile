<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientCreateTest extends TestCase
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
    function a_guests_user_may_not_access_create_clients()
    {
        $this->post('/clients')
            ->assertRedirect('/login');

        $this->get('/clients/create')
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_may_create_clients()
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

        $this->post('/clients', $data)
            ->assertExactJson(['status' => true]);

        $this->assertDatabaseHas('clients', [
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

    function createClient($overrides = [])
    {
        $this->signIn();
        $client = factory('ProChile\Client')->make($overrides);

        return $this->post('/clients', $client->toArray());
    }

    /** @test */
    function a_client_require_a_male_surname()
    {
        $this->createClient(['male_surname' => null])
            ->assertSessionHasErrors('male_surname');
    }

    /** @test */
    function a_client_require_a_female_surname()
    {
        $this->createClient(['female_surname' => null])
            ->assertSessionHasErrors('female_surname');
    }

    /** @test */
    function a_client_require_a_first_name()
    {
        $this->createClient(['first_name' => null])
            ->assertSessionHasErrors('first_name');
    }

    /** @test */
    function a_client_require_a_rut()
    {
        $this->createClient(['rut' => null])
            ->assertSessionHasErrors('rut');
    }

    /** @test */
    function a_client_not_store_a_duplicate_rut()
    {
        $this->createClient(['rut' => '17.032.680-6']);

        $this->createClient(['rut' => '17.032.680-6'])
            ->assertSessionHasErrors('rut');
    }

    /** @test */
    function a_client_store_a_company_id_valid()
    {
        $this->createClient(['company_id' => factory('ProChile\Company')->create()->id]);

        $this->createClient(['company_id' => 9999])
            ->assertSessionHasErrors('company_id');
    }

    /** @test */
    function a_client_store_a_industry_id_valid()
    {
        $this->createClient(['industry_id' => factory('ProChile\Company')->create()->id]);

        $this->createClient(['industry_id' => 9999])
            ->assertSessionHasErrors('industry_id');
    }

    /** @test */
    function a_client_require_a_email()
    {
        $this->createClient(['email' => null])
            ->assertSessionHasErrors('email');
    }

    /** @test */
    function a_client_require_a_valid_email()
    {
        $this->createClient(['email' => 'rzpn@'])
            ->assertSessionHasErrors('email');
    }

    /** @test */
    function a_client_require_a_phone()
    {
        $this->createClient(['phone' => null])
            ->assertSessionHasErrors('phone');
    }
}
