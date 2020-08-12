<?php

namespace App\Http\Controllers;

use App\Course;
use App\Category;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses = Course::all();

        return view('course.index', compact('courses'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category =  Category::pluck('name', 'id');

        return view('course.create', compact('category'));
    }

    /**
     * @param \App\Http\Requests\CourseStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseStoreRequest $request)
    {
        $course = Course::create($request->all());

        $request->session()->flash('course.id', $course->id);

        return redirect()->route('course.index')
            ->with('info', 'Curso creado con Exito!');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Course $course)
    {
        return view('course.show', compact('course'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Course $course)
    {
        $category =  Category::pluck('name', 'id');

        return view('course.edit', compact('category', 'course'));
    }

    /**
     * @param \App\Http\Requests\CourseUpdateRequest $request
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseUpdateRequest $request, Course $course)
    {
        $course->update($request->all());

        $request->session()->flash('course.id', $course->id);

        return redirect()->route('course.index')
            ->with('success', 'Curso actualizado con Exito!');;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Course $course)
    {
        $course->delete();

        return redirect()->route('course.index')
            ->with('error', 'Curso eliminado con Exito!');
    }

    public function searchCourse(Category $category)
    {
       $courses =  $category->courses;

        return Response()->json($courses);
    }
}
