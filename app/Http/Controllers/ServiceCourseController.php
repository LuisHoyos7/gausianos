<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceCourseStoreRequest;
use App\Http\Requests\ServiceCourseUpdateRequest;
use App\ServiceCourse;
use App\ServiceType;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceCourseController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $serviceCourses = ServiceCourse::all();

        return view('serviceCourse.index', compact('serviceCourses'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $serviceType = ServiceType::pluck('name', 'id');

        $course = Course::pluck('name', 'id');

        return view('serviceCourse.create', compact('course', 'serviceType'));
    }

    /**
     * @param \App\Http\Requests\ServiceCourseStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceCourseStoreRequest $request)
    {
        $serviceCourse = ServiceCourse::create($request->all());

        $request->session()->flash('serviceCourse.id', $serviceCourse->id);

        return redirect()->route('service-course.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ServiceCourse $serviceCourse
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ServiceCourse $serviceCourse)
    {
        return view('serviceCourse.show', compact('serviceCourse'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ServiceCourse $serviceCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ServiceCourse $serviceCourse)
    {
        $serviceType = ServiceType::pluck('name', 'id');

        $course = Course::pluck('name', 'id');

        return view('serviceCourse.edit', compact('serviceCourse','serviceType','course'));
    }

    /**
     * @param \App\Http\Requests\ServiceCourseUpdateRequest $request
     * @param \App\ServiceCourse $serviceCourse
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceCourseUpdateRequest $request, ServiceCourse $serviceCourse)
    {
        $serviceCourse->update($request->all());

        $request->session()->flash('serviceCourse.id', $serviceCourse->id);

        return redirect()->route('service-course.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ServiceCourse $serviceCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ServiceCourse $serviceCourse)
    {
        $serviceCourse->delete();

        return redirect()->route('service-course.index');
    }

    public function searchServiceType($id){

        $serviceType = ServiceCourse::where('course_id',$id)->get();

        return Response()->json($serviceType);
    }
}
