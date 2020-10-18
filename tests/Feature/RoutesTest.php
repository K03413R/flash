<?php

namespace Tests\Feature;

use App\Models\Route;
use App\Models\Tick;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_user_can_view_routes()
    {
        $route = Route::factory()->create();
        $this->get('/routes')->assertSee($route->name);
    }

    /** @test */
    function a_user_can_tick_a_route()
    {
        $this->withoutExceptionHandling();
        $tick = Tick::factory()->raw();
        $route = Route::factory()->create();

        $this->post("/routes/{$route->id}/ticks", $tick);

        $this->assertDatabaseCount('ticks', 1);
    }
}
