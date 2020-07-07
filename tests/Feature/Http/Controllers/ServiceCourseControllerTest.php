<?php

namespace Tests\Feature\Http\Controllers;

use App\ServiceCourse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ServiceCourseController
 */
class ServiceCourseControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $serviceCourses = factory(ServiceCourse::class, 3)->create();

        $response = $this->get(route('service-course.index'));

        $response->assertOk();
        $response->assertViewIs('serviceCourse.index');
        $response->assertViewHas('serviceCourses');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('service-course.create'));

        $response->assertOk();
        $response->assertViewIs('serviceCourse.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServiceCourseController::class,
            'store',
            \App\Http\Requests\ServiceCourseStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $serviceCourse = $this->faker->word;

        $response = $this->post(route('service-course.store'), [
            'serviceCourse' => $serviceCourse,
        ]);

        $serviceCourses = ServiceCourse::query()
            ->where('serviceCourse', $serviceCourse)
            ->get();
        $this->assertCount(1, $serviceCourses);
        $serviceCourse = $serviceCourses->first();

        $response->assertRedirect(route('serviceCourse.index'));
        $response->assertSessionHas('serviceCourse.id', $serviceCourse->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $serviceCourse = factory(ServiceCourse::class)->create();

        $response = $this->get(route('service-course.show', $serviceCourse));

        $response->assertOk();
        $response->assertViewIs('serviceCourse.show');
        $response->assertViewHas('serviceCourse');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $serviceCourse = factory(ServiceCourse::class)->create();

        $response = $this->get(route('service-course.edit', $serviceCourse));

        $response->assertOk();
        $response->assertViewIs('serviceCourse.edit');
        $response->assertViewHas('serviceCourse');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServiceCourseController::class,
            'update',
            \App\Http\Requests\ServiceCourseUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $serviceCourse = factory(ServiceCourse::class)->create();
        $serviceCourse = $this->faker->word;

        $response = $this->put(route('service-course.update', $serviceCourse), [
            'serviceCourse' => $serviceCourse,
        ]);

        $response->assertRedirect(route('serviceCourse.index'));
        $response->assertSessionHas('serviceCourse.id', $serviceCourse->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $serviceCourse = factory(ServiceCourse::class)->create();

        $response = $this->delete(route('service-course.destroy', $serviceCourse));

        $response->assertRedirect(route('serviceCourse.index'));

        $this->assertDeleted($serviceCourse);
    }
}
