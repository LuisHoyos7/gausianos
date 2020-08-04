<?php

namespace App\Http\Controllers;

use App\Asesor;
use App\Http\Requests\AsesorStoreRequest;
use App\Http\Requests\AsesorUpdateRequest;
use Illuminate\Http\Request;

class AsesorController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $asesors = Asesor::all();

        return view('asesor.index', compact('asesors'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('asesor.create');
    }

    /**
     * @param \App\Http\Requests\AsesorStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsesorStoreRequest $request)
    {
        $asesor = Asesor::create($request->all());

        $request->session()->flash('asesor.id', $asesor->id);

        return redirect()->route('asesor.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Asesor $asesor
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Asesor $asesor)
    {
        return view('asesor.show', compact('asesor'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Asesor $asesor
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Asesor $asesor)
    {
        return view('asesor.edit', compact('asesor'));
    }

    /**
     * @param \App\Http\Requests\AsesorUpdateRequest $request
     * @param \App\Asesor $asesor
     * @return \Illuminate\Http\Response
     */
    public function update(AsesorUpdateRequest $request, Asesor $asesor)
    {
        $asesor->update($request->all());

        $request->session()->flash('asesor.id', $asesor->id);

        return redirect()->route('asesor.index')
            ->with('info', 'Editado Con Exito');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Asesor $asesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Asesor $asesor)
    {
        $asesor->delete();

        return redirect()->route('asesor.index')
            ->with('error', 'Eliminado Con Exito');
    }
}
