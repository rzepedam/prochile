<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientShowTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
    	parent::setUp();
    }

    /** @test */
    function a_guests_user_may_not_show_clients()
    {
        $client = factory('ProChile\Client')->create();
        $this->get('/clients/' . $client->id)
            ->assertRedirect('/login');
    }

    /** @test */
    function it_is_possible_to_see_the_client()
    {
        $this->signIn();
        $client = factory('ProChile\Client')->create();

        $this->get('/clients/' . $client->id)
            ->assertSee($client->company->name)
            ->assertSee($client->industry->name)
            ->assertSee($client->first_name)
            ->assertSee($client->male_surname)
            ->assertSee($client->female_surname)
            ->assertSee($client->rut)
            ->assertSee($client->phone)
            ->assertSee($client->email);
    }
}
