<?php

namespace Tests\Feature\Http\Controllers;

use App\WorkType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\WorkTypeController
 */
class WorkTypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $workTypes = factory(WorkType::class, 3)->create();

        $response = $this->get(route('work-type.index'));

        $response->assertOk();
        $response->assertViewIs('workType.index');
        $response->assertViewHas('workTypes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('work-type.create'));

        $response->assertOk();
        $response->assertViewIs('workType.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\WorkTypeController::class,
            'store',
            \App\Http\Requests\WorkTypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $workType = $this->faker->word;

        $response = $this->post(route('work-type.store'), [
            'workType' => $workType,
        ]);

        $workTypes = WorkType::query()
            ->where('workType', $workType)
            ->get();
        $this->assertCount(1, $workTypes);
        $workType = $workTypes->first();

        $response->assertRedirect(route('workType.index'));
        $response->assertSessionHas('workType.id', $workType->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $workType = factory(WorkType::class)->create();

        $response = $this->get(route('work-type.show', $workType));

        $response->assertOk();
        $response->assertViewIs('workType.show');
        $response->assertViewHas('workType');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $workType = factory(WorkType::class)->create();

        $response = $this->get(route('work-type.edit', $workType));

        $response->assertOk();
        $response->assertViewIs('workType.edit');
        $response->assertViewHas('workType');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\WorkTypeController::class,
            'update',
            \App\Http\Requests\WorkTypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $workType = factory(WorkType::class)->create();
        $workType = $this->faker->word;

        $response = $this->put(route('work-type.update', $workType), [
            'workType' => $workType,
        ]);

        $response->assertRedirect(route('workType.index'));
        $response->assertSessionHas('workType.id', $workType->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $workType = factory(WorkType::class)->create();

        $response = $this->delete(route('work-type.destroy', $workType));

        $response->assertRedirect(route('workType.index'));

        $this->assertDeleted($workType);
    }
}
