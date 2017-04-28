<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AssistanceEditTest extends TestCase
{
    use DatabaseTransactions;

    protected $assistance;

    public function setUp()
    {
        parent::setUp();
        $this->assistance = factory('ProChile\Assistance')->create();
        dd($this->assistance);
    }

    /** @test */
    function a_guests_user_may_not_access_edit_assistance()
    {
        $this->get('/assistances/' . $this->assistance->id . '/edit')
            ->assertRedirect('/login');

        $this->put('/assistances/' . $this->assistance->id)
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_may_visit_edit_assistance()
    {
        $this->signIn();

        $this->get('/assistances/' . $this->assistance->id . '/edit')
            ->assertSee($this->assistance->position->name)
            ->assertSee($this->assistance->typeAssistance->name)
            ->assertSee($this->assistance->city->name)
            ->assertSee($this->assistance->company->name)
            ->assertSee($this->assistance->industry->name)
            ->assertSee($this->assistance->first_name)
            ->assertSee($this->assistance->male_surname)
            ->assertSee($this->assistance->female_surname)
            ->assertSee($this->assistance->rut)
            ->assertSee($this->assistance->rut)
            ->assertSee($this->assistance->phone)
            ->assertSee($this->assistance->email);
    }

    /** @test */
    function a_user_can_update_a_assistance()
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
            'email'          => 'raulmeza@controlqtime.cl'
        ];

        $this->put('/assistances/' . $this->assistance->id, $data)
            ->assertExactJson(['status' => true]);

        $this->assertDatabaseHas('assistances', [
            'first_name'     => 'Raúl',
            'male_surname'   => 'Meza',
            'female_surname' => 'Mora',
            'rut'            => '17032680-6',
            'company_id'     => $company->id,
            'industry_id'    => $industry->id,
            'phone'          => '+56930972340',
            'email'          => 'raulmeza@controlqtime.cl'])
            ->assertDatabaseHas('users', [
                'name'  => 'Raúl Meza',
                'email' => 'raulmeza@controlqtime.cl'
            ]);
    }

    function updateAssistance($overrides = [])
    {
        $this->signIn();
        $assistance = factory('ProChile\Assistance')->create();
        $data       = factory('ProChile\Assistance')->make($overrides);

        return $this->put('/assistances/' . $assistance->id, $data->toArray());
    }

    /** @test */
    function a_assistance_require_a_male_surname()
    {
        $this->updateAssistance(['male_surname' => null])
            ->assertSessionHasErrors('male_surname');
    }

    /** @test */
    function a_assistance_require_a_female_surname()
    {
        $this->updateAssistance(['female_surname' => null])
            ->assertSessionHasErrors('female_surname');
    }

    /** @test */
    function a_assistance_require_a_first_name()
    {
        $this->updateAssistance(['first_name' => null])
            ->assertSessionHasErrors('first_name');
    }

    /** @test */
    function a_assistance_require_a_rut()
    {
        $this->updateAssistance(['rut' => null])
            ->assertSessionHasErrors('rut');
    }

    /** @test */
    function a_assistance_not_update_a_duplicate_rut()
    {
        factory('ProChile\Assistance')->create(['rut' => '17.032.680-6']);

        $this->updateAssistance(['rut' => '17.032.680-6'])
            ->assertSessionHasErrors('rut');
    }

    /** @test */
    function a_assistance_update_a_company_id_valid()
    {
        $this->updateAssistance(['company_id' => factory('ProChile\Company')->create()->id]);

        $this->updateAssistance(['company_id' => 9999])
            ->assertSessionHasErrors('company_id');
    }

    /** @test */
    function a_assistance_update_a_industry_id_valid()
    {
        $this->updateAssistance(['industry_id' => factory('ProChile\Company')->create()->id]);

        $this->updateAssistance(['industry_id' => 9999])
            ->assertSessionHasErrors('industry_id');
    }

    /** @test */
    function a_assistance_require_a_email()
    {
        $this->updateAssistance(['email' => null])
            ->assertSessionHasErrors('email');
    }

    /** @test */
    function a_assistance_require_a_valid_email()
    {
        $this->updateAssistance(['email' => 'rzpn@'])
            ->assertSessionHasErrors('email');
    }

    /** @test */
    function a_assistance_require_a_phone()
    {
        $this->updateAssistance(['phone' => null])
            ->assertSessionHasErrors('phone');
    }
}
