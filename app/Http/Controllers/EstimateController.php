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
    
    $user_exist = User::where('email' , $request->mail)->get();
    $customer_exist = Customer::where('mobile', $request->mobile)->get();
    //validamos si la persona que hace la cotizacion existe en el sistema 
    //si es asi solo le creamos la cotizacion, si no le creamos el usuario
    if(!$user_exist->isEmpty() || !$customer_exist->isEmpty()){
    

       if(!$user_exist->isEmpty() && $customer_exist->isEmpty()) {
            $customer_id = Customer::where('user_id', $user_exist->first()->id)->get();
            
            $estimate = Estimate::create([
                'course_id' => $request->cuorse,
                'work_type_id' => $request->workType,
                'customer_id' => $customer_id->first()->id,
                'delivery_date' => $request->delivery_date,
                'delivery_hour' => $request->delivery_hour,
                'description' => $request->description,
                'theme' => $request->theme,    
                'sheets_number' => $request->sheets_number,   
                'standard' => $request->standard,       
            ]);
        }

        if($user_exist->isEmpty()  && !$customer_exist->isEmpty()) {
            $estimate = Estimate::create([
                'course_id' => $request->cuorse,
                'work_type_id' => $request->workType,
                'customer_id' => $customer_exist->first()->id,
                'delivery_date' => $request->delivery_date,
                'delivery_hour' => $request->delivery_hour,
                'description' => $request->description,
                'theme' => $request->theme,    
                'sheets_number' => $request->sheets_number,   
                'standard' => $request->standard,       
            ]);
        }

        if(!$user_exist->isEmpty()  && !$customer_exist->isEmpty()) {
            $estimate = Estimate::create([
                'course_id' => $request->cuorse,
                'work_type_id' => $request->workType,
                'customer_id' => $customer_exist->first()->id,
                'delivery_date' => $request->delivery_date,
                'delivery_hour' => $request->delivery_hour,
                'description' => $request->description,
                'theme' => $request->theme,    
                'sheets_number' => $request->sheets_number,   
                'standard' => $request->standard,       
            ]);
        }
        
    }  else {

        $user = User::create([
                    'name'      => $request->name,
                    'email'     => $request->mail,
                    'password' => Hash::make($request->mobile),
                ]); 
        
        $customer = Customer::create([
                        'user_id' => $user->id,
                        'mobile'  => $request->mobile,
        ]);

        $estimate = Estimate::create([
            'course_id' => $request->cuorse,
            'work_type_id' => $request->workType,
            'customer_id' => $customer->id,
            'delivery_date' => $request->delivery_date,
            'delivery_hour' => $request->delivery_hour,
            'description' => $request->description,
            'theme' => $request->theme,    
            'sheets_number' => $request->sheets_number,   
            'standard' => $request->standard,       
        ]);
        }
        $request->session()->flash('estimate.id', $estimate->id);

        return redirect()->route('welcome')
            ->with('success', 'Su cotizacion se ha creado con exito, En unos minutos nos comunicaremos con Usted');
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
