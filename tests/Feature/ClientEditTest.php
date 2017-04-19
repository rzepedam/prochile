<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientEditTest extends TestCase
{
    use DatabaseTransactions;

    protected $client;

    public function setUp()
    {
        parent::setUp();
        $this->client = factory('ProChile\Client')->create();
    }

    /** @test */
    function a_guests_user_may_not_access_edit_client()
    {
        $this->get('/clients/' . $this->client->id . '/edit')
            ->assertRedirect('/login');

        $this->put('/clients/' . $this->client->id)
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_may_visit_edit_client()
    {
        $this->signIn();

        $this->get('/clients/' . $this->client->id . '/edit')
            ->assertSee($this->client->first_name)
            ->assertSee($this->client->male_surname)
            ->assertSee($this->client->female_surname)
            ->assertSee($this->client->rut)
            ->assertSee($this->client->company->name)
            ->assertSee($this->client->industry->name)
            ->assertSee($this->client->rut)
            ->assertSee($this->client->phone)
            ->assertSee($this->client->email);
    }

    /** @test */
    function a_user_can_update_a_client()
    {
        $this->signIn();
        $company  = factory('ProChile\Company')->create();
        $industry = factory('ProChile\Industry')->create();

        $data = [
            'first_name'     => 'Raúl',
            'male_surname'   => 'Meza',
            'female_surname' => 'Mora',
            'rut'            => '17.032.680-6',
            'company_id'     => $company->id,
            'industry_id'    => $industry->id,
            'phone'          => '+56930972340',
            'email'          => 'rauleliasmezamora@gmail.com'
        ];

        $this->put('/clients/' . $this->client->id, $data)
            ->assertExactJson(['status' => true]);

        $this->assertDatabaseHas('clients', [
            'first_name'     => 'Raúl',
            'male_surname'   => 'Meza',
            'female_surname' => 'Mora',
            'rut'            => '17032680-6',
            'company_id'     => $company->id,
            'industry_id'    => $industry->id,
            'phone'          => '+56930972340',
            'email'          => 'rauleliasmezamora@gmail.com'
        ]);
    }

    function updateClient($overrides = [])
    {
        $this->signIn();
        $client = factory('ProChile\Client')->create();
        $data   = factory('ProChile\Client')->make($overrides);

        return $this->put('/clients/' . $client->id, $data->toArray());
    }

    /** @test */
    function a_client_require_a_male_surname()
    {
        $this->updateClient(['male_surname' => null])
            ->assertSessionHasErrors('male_surname');
    }

    /** @test */
    function a_client_require_a_female_surname()
    {
        $this->updateClient(['female_surname' => null])
            ->assertSessionHasErrors('female_surname');
    }

    /** @test */
    function a_client_require_a_first_name()
    {
        $this->updateClient(['first_name' => null])
            ->assertSessionHasErrors('first_name');
    }

    /** @test */
    function a_client_require_a_rut()
    {
        $this->updateClient(['rut' => null])
            ->assertSessionHasErrors('rut');
    }

    /** @test */
    function a_client_not_update_a_duplicate_rut()
    {
        factory('ProChile\Client')->create(['rut' => '17.032.680-6']);

        $this->updateClient(['rut' => '17.032.680-6'])
            ->assertSessionHasErrors('rut');
    }

    /** @test */
    function a_client_update_a_company_id_valid()
    {
        $this->updateClient(['company_id' => factory('ProChile\Company')->create()->id]);

        $this->updateClient(['company_id' => 9999])
            ->assertSessionHasErrors('company_id');
    }

    /** @test */
    function a_client_update_a_industry_id_valid()
    {
        $this->updateClient(['industry_id' => factory('ProChile\Company')->create()->id]);

        $this->updateClient(['industry_id' => 9999])
            ->assertSessionHasErrors('industry_id');
    }

    /** @test */
    function a_client_require_a_email()
    {
        $this->updateClient(['email' => null])
            ->assertSessionHasErrors('email');
    }

    /** @test */
    function a_client_require_a_valid_email()
    {
        $this->updateClient(['email' => 'rzpn@'])
            ->assertSessionHasErrors('email');
    }

    /** @test */
    function a_client_require_a_phone()
    {
        $this->updateClient(['phone' => null])
            ->assertSessionHasErrors('phone');
    }
}
