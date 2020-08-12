<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkTypeStoreRequest;
use App\Http\Requests\WorkTypeUpdateRequest;
use App\WorkType;
use App\ServiceType;
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
        $serviceType = ServiceType::pluck('name', 'id');
        return view('workType.create', compact('serviceType'));
    }

    /**
     * @param \App\Http\Requests\WorkTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkTypeStoreRequest $request)
    {
        $workType = WorkType::create($request->all());

        $request->session()->flash('workType.id', $workType->id);

        return redirect()->route('work-type.index')
            ->with('info', 'Tipo de trabajo creado con Exito!');
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
        $serviceType = ServiceType::pluck('name', 'id');

        return view('workType.edit', compact('workType', 'serviceType'));
    }

    /**
     * @param \App\Http\Requests\WorkTypeUpdateRequest $request
     * @param \App\WorkType $workType
     * @return \Illuminate\Http\Response
     */
    public function update(WorkTypeUpdateRequest $request, WorkType $workType)
    {
        $workType->update($request->all());

        $request->session()->flash('workType.id', $workType->id);

        return redirect()->route('work-type.index')
            ->with('success', 'Tipo de trabajo actualizado con Exito!');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\WorkType $workType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, WorkType $workType)
    {
        $workType->delete();

        return redirect()->route('work-type.index')
            ->with('error', 'Tipo de trabajo eliminado con Exito!');
    }

    public function searchWorkType($id){

        $WorkType = WorkType::where('service_type_id',$id)->get();

        return Response()->json($WorkType);
    }

    public function searchWorkTypeEspecific($id){

        $WorkTypeEspecific = WorkType::where('service_type_id',$id)->get();

        return Response()->json($WorkTypeEspecific);
    }


}
