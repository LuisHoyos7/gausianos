<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Estimate;
use App\User;
use App\Customer;
use App\Http\Requests\EstimateStoreRequest;
use App\Http\Requests\EstimateUpdateRequest;
use Illuminate\Http\Request;

class EstimateController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $estimates = Estimate::all();

        return view('estimate.index', compact('estimates'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('estimate.create');
    }

    /**
     * @param \App\Http\Requests\EstimateStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstimateStoreRequest $request)
    {
        $user = User::create([
                    'name'      => $request->name,
                    'email'     => $request->mail,
                    'password' => Hash::make($request->mobile),
                ]);

        $user_id = User::last()->id;  

        $customer = Customer::create([
                        'user_id' => $user_id,
                        'mobile'  => $request->mobile,
        ]);
        
        $estimate = Estimate::create($request->all());

        $request->session()->flash('estimate.id', $estimate->id);

        return redirect()->route('estimate.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Estimate $estimate
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Estimate $estimate)
    {
        return view('estimate.show', compact('estimate'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Estimate $estimate
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Estimate $estimate)
    {
        return view('estimate.edit', compact('estimate'));
    }

    /**
     * @param \App\Http\Requests\EstimateUpdateRequest $request
     * @param \App\Estimate $estimate
     * @return \Illuminate\Http\Response
     */
    public function update(EstimateUpdateRequest $request, Estimate $estimate)
    {
        $estimate->update([]);

        $request->session()->flash('estimate.id', $estimate->id);

        return redirect()->route('estimate.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Estimate $estimate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Estimate $estimate)
    {
        $estimate->delete();

        return redirect()->route('estimate.index');
    }
}
