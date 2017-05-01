<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AssistanceTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    function can_display_formatted_rut()
    {
        $assistance = factory('ProChile\Assistance')->create(['rut' => '16356109-3']);

        $this->assertEquals('16.356.109-3', $assistance->rut);
    }
}
