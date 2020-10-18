<?php

namespace Tests\Feature;

use App\Models\Route;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTickTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function can_create_a_tick()
    {
        Livewire::test('ticks.create-tick')
            ->set('route', Route::factory()->create())
            ->set('comment', 'This is a test comment')
            ->call('createTick')
            ->assertRedirect('/routes')
        ;

        $this->assertDatabaseCount('ticks', 1);
    }
}
