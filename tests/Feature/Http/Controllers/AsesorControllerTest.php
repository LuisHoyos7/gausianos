<?php

namespace Tests\Feature\Http\Controllers;

use App\Asesor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AsesorController
 */
class AsesorControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $asesors = factory(Asesor::class, 3)->create();

        $response = $this->get(route('asesor.index'));

        $response->assertOk();
        $response->assertViewIs('asesor.index');
        $response->assertViewHas('asesors');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('asesor.create'));

        $response->assertOk();
        $response->assertViewIs('asesor.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AsesorController::class,
            'store',
            \App\Http\Requests\AsesorStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $asesor = $this->faker->word;

        $response = $this->post(route('asesor.store'), [
            'asesor' => $asesor,
        ]);

        $asesors = Asesor::query()
            ->where('asesor', $asesor)
            ->get();
        $this->assertCount(1, $asesors);
        $asesor = $asesors->first();

        $response->assertRedirect(route('asesor.index'));
        $response->assertSessionHas('asesor.id', $asesor->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $asesor = factory(Asesor::class)->create();

        $response = $this->get(route('asesor.show', $asesor));

        $response->assertOk();
        $response->assertViewIs('asesor.show');
        $response->assertViewHas('asesor');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $asesor = factory(Asesor::class)->create();

        $response = $this->get(route('asesor.edit', $asesor));

        $response->assertOk();
        $response->assertViewIs('asesor.edit');
        $response->assertViewHas('asesor');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AsesorController::class,
            'update',
            \App\Http\Requests\AsesorUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $asesor = factory(Asesor::class)->create();
        $asesor = $this->faker->word;

        $response = $this->put(route('asesor.update', $asesor), [
            'asesor' => $asesor,
        ]);

        $response->assertRedirect(route('asesor.index'));
        $response->assertSessionHas('asesor.id', $asesor->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $asesor = factory(Asesor::class)->create();

        $response = $this->delete(route('asesor.destroy', $asesor));

        $response->assertRedirect(route('asesor.index'));

        $this->assertDeleted($asesor);
    }
}
