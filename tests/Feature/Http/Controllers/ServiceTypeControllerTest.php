<?php

namespace Tests\Feature\Http\Controllers;

use App\ServiceType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ServiceTypeController
 */
class ServiceTypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $serviceTypes = factory(ServiceType::class, 3)->create();

        $response = $this->get(route('service-type.index'));

        $response->assertOk();
        $response->assertViewIs('serviceType.index');
        $response->assertViewHas('serviceTypes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('service-type.create'));

        $response->assertOk();
        $response->assertViewIs('serviceType.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServiceTypeController::class,
            'store',
            \App\Http\Requests\ServiceTypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $serviceType = $this->faker->word;

        $response = $this->post(route('service-type.store'), [
            'serviceType' => $serviceType,
        ]);

        $serviceTypes = ServiceType::query()
            ->where('serviceType', $serviceType)
            ->get();
        $this->assertCount(1, $serviceTypes);
        $serviceType = $serviceTypes->first();

        $response->assertRedirect(route('serviceType.index'));
        $response->assertSessionHas('serviceType.id', $serviceType->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $serviceType = factory(ServiceType::class)->create();

        $response = $this->get(route('service-type.show', $serviceType));

        $response->assertOk();
        $response->assertViewIs('serviceType.show');
        $response->assertViewHas('serviceType');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $serviceType = factory(ServiceType::class)->create();

        $response = $this->get(route('service-type.edit', $serviceType));

        $response->assertOk();
        $response->assertViewIs('serviceType.edit');
        $response->assertViewHas('serviceType');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServiceTypeController::class,
            'update',
            \App\Http\Requests\ServiceTypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $serviceType = factory(ServiceType::class)->create();
        $serviceType = $this->faker->word;

        $response = $this->put(route('service-type.update', $serviceType), [
            'serviceType' => $serviceType,
        ]);

        $response->assertRedirect(route('serviceType.index'));
        $response->assertSessionHas('serviceType.id', $serviceType->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $serviceType = factory(ServiceType::class)->create();

        $response = $this->delete(route('service-type.destroy', $serviceType));

        $response->assertRedirect(route('serviceType.index'));

        $this->assertDeleted($serviceType);
    }
}
