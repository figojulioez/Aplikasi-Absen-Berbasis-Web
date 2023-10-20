<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\LiveSearchKaryawan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class LiveSearchKaryawanTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(LiveSearchKaryawan::class);

        $component->assertStatus(200);
    }
}
