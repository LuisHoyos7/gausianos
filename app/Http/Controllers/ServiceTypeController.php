<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceTypeStoreRequest;
use App\Http\Requests\ServiceTypeUpdateRequest;
use App\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $serviceTypes = ServiceType::all();

        return view('serviceType.index', compact('serviceTypes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('serviceType.create');
    }

    /**
     * @param \App\Http\Requests\ServiceTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceTypeStoreRequest $request)
    {
        $serviceType = ServiceType::create($request->all());

        $request->session()->flash('serviceType.id', $serviceType->id);

        return redirect()->route('service-type.index')
            ->with('info','Servicio creado con Exito!');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ServiceType $serviceType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ServiceType $serviceType)
    {
        return view('service-type.show', compact('serviceType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ServiceType $serviceType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ServiceType $serviceType)
    {
        return view('serviceType.edit', compact('serviceType'));
    }

    /**
     * @param \App\Http\Requests\ServiceTypeUpdateRequest $request
     * @param \App\ServiceType $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceTypeUpdateRequest $request, ServiceType $serviceType)
    {
        $serviceType->update($request->all());

        $request->session()->flash('serviceType.id', $serviceType->id);

        return redirect()->route('service-type.index')
            ->with('success','Servicio actualizado con Exito!');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ServiceType $serviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ServiceType $serviceType)
    {
        $serviceType->delete();

        return redirect()->route('service-type.index')
            ->with('error','Servicio eliminado con Exito!');
    }
}
