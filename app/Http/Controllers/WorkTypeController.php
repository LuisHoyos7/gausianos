<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkTypeStoreRequest;
use App\Http\Requests\WorkTypeUpdateRequest;
use App\WorkType;
use Illuminate\Http\Request;

class WorkTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $workTypes = WorkType::all();

        return view('workType.index', compact('workTypes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('workType.create');
    }

    /**
     * @param \App\Http\Requests\WorkTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkTypeStoreRequest $request)
    {
        $workType = WorkType::create($request->all());

        $request->session()->flash('workType.id', $workType->id);

        return redirect()->route('workType.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\WorkType $workType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, WorkType $workType)
    {
        return view('workType.show', compact('workType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\WorkType $workType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, WorkType $workType)
    {
        return view('workType.edit', compact('workType'));
    }

    /**
     * @param \App\Http\Requests\WorkTypeUpdateRequest $request
     * @param \App\WorkType $workType
     * @return \Illuminate\Http\Response
     */
    public function update(WorkTypeUpdateRequest $request, WorkType $workType)
    {
        $workType->update([]);

        $request->session()->flash('workType.id', $workType->id);

        return redirect()->route('workType.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\WorkType $workType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, WorkType $workType)
    {
        $workType->delete();

        return redirect()->route('workType.index');
    }
}
