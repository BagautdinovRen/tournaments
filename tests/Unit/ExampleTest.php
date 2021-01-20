<?php

namespace Tests\Unit;

use App\Http\Controllers\Api\Front\PlayerController;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertEquals('hello', (new PlayerController())->getHello());
    }
}
