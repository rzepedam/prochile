<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AssistanceShowTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    function a_guests_user_may_not_show_assistances()
    {
        $assistance = factory('ProChile\Assistance')->create();
        $this->get('/assistances/' . $assistance->id)
            ->assertRedirect('/login');
    }

    /** @test */
    function it_is_possible_to_see_the_assistance()
    {
        $this->signIn();
        $assistance = factory('ProChile\Assistance')->create();

        $this->get('/assistances/' . $assistance->id)
            ->assertSee($assistance->company->name)
            ->assertSee($assistance->industry->name)
            ->assertSee($assistance->first_name)
            ->assertSee($assistance->male_surname)
            ->assertSee($assistance->female_surname)
            ->assertSee($assistance->rut)
            ->assertSee($assistance->phone)
            ->assertSee($assistance->email);
    }
}
