<?php

namespace Tests\Feature\Http\Controllers;

use App\Estimate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EstimateController
 */
class EstimateControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $estimates = factory(Estimate::class, 3)->create();

        $response = $this->get(route('estimate.index'));

        $response->assertOk();
        $response->assertViewIs('estimate.index');
        $response->assertViewHas('estimates');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('estimate.create'));

        $response->assertOk();
        $response->assertViewIs('estimate.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EstimateController::class,
            'store',
            \App\Http\Requests\EstimateStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $estimate = $this->faker->word;

        $response = $this->post(route('estimate.store'), [
            'estimate' => $estimate,
        ]);

        $estimates = Estimate::query()
            ->where('estimate', $estimate)
            ->get();
        $this->assertCount(1, $estimates);
        $estimate = $estimates->first();

        $response->assertRedirect(route('estimate.index'));
        $response->assertSessionHas('estimate.id', $estimate->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $estimate = factory(Estimate::class)->create();

        $response = $this->get(route('estimate.show', $estimate));

        $response->assertOk();
        $response->assertViewIs('estimate.show');
        $response->assertViewHas('estimate');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $estimate = factory(Estimate::class)->create();

        $response = $this->get(route('estimate.edit', $estimate));

        $response->assertOk();
        $response->assertViewIs('estimate.edit');
        $response->assertViewHas('estimate');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EstimateController::class,
            'update',
            \App\Http\Requests\EstimateUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $estimate = factory(Estimate::class)->create();
        $estimate = $this->faker->word;

        $response = $this->put(route('estimate.update', $estimate), [
            'estimate' => $estimate,
        ]);

        $response->assertRedirect(route('estimate.index'));
        $response->assertSessionHas('estimate.id', $estimate->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $estimate = factory(Estimate::class)->create();

        $response = $this->delete(route('estimate.destroy', $estimate));

        $response->assertRedirect(route('estimate.index'));

        $this->assertDeleted($estimate);
    }
}
