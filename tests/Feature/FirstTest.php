<?php

namespace Tests\Feature;

use Tests\TestCase;

class FirstTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPlayersApi()
    {
        $response = $this->getJson('/api/players');

        $response->assertJsonPath('0.name', 'Albert');

        //$response->assertStatus(200);
    }
}
