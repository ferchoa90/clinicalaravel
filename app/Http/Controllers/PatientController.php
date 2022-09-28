<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function __invoke()
    {
        return view('patient.index', ["menu" => Patient::paginate(10)]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("patient.index", ["menu" => Patient::paginate(10)]);
    }

    public function create()
    {
        return view("patient.create", ["country" => Country::where(["id"=>63])->get(),"state" => State::where(["country_id"=>63])->get(),"city" => City::whereIn('state_id', ['1022', '1023', '1024', '1025', '1026', '1027', '1028', '1029', '1030', '1031', '1032', '1033', '1034', '1035', '1036', '1037', '1038', '1039', '1040', '1041', '1042', '1043'])->orderBy("name","asc")->get()]);
    }

    /**
     * Retiros a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Patient();
 
        $model->name = $request->name;
        $model->lastname = $request->lastname;
        $model->address = $request->address;
        $model->bloodtype = $request->bloodtype;
        $model->cellphone = $request->cellphone;
        $model->country = $request->country;
        $model->state = $request->state;
        $model->city = $request->city;
        $model->email = $request->email;
        $model->inmunizations = $request->inmunizations;
        $model->allergy = $request->allergy;
        $model->allergies = $request->allergies;
        $model->user_cre = auth()->user()->id;
        $model->status =1;
        $model->saveOrFail();
        return redirect()->route('patient.index')
            ->with('msg','Paciente creado!');

    }

    public function edit(Patient $patient)
    {
        
        return view("patient.edit", ["patient" => $patient,"country" => Country::where(["id"=>63])->get(),"state" => State::where(["country_id"=>63])->get(),"city" => City::whereIn('state_id', ['1022', '1023', '1024', '1025', '1026', '1027', '1028', '1029', '1030', '1031', '1032', '1033', '1034', '1035', '1036', '1037', '1038', '1039', '1040', '1041', '1042', '1043'])->orderBy("name","asc")->get()        ]);
    }

    public function update(Request $request, $id)
    {
        //var_dump($id);
        $model = Patient::find($id);
        $model->name = $request->name;
        $model->lastname = $request->lastname;
        $model->address = $request->address;
        $model->bloodtype = $request->bloodtype;
        $model->cellphone = $request->cellphone;
        $model->country = $request->country;
        $model->state = $request->state;
        $model->city = $request->city;
        $model->email = $request->email;
        $model->inmunizations = $request->inmunizations;
        $model->allergy = $request->allergy;
        $model->allergies = $request->allergies;
        $model->user_upd = auth()->user()->id;
       
        $model->saveOrFail();
        return redirect()->back()->with(['msg' => "Paciente actualizado!"]);
 
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Category $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //die(var_dump($patient->id));
        $patient->delete();
        return redirect()->route("patient.index")->with(["msg" => "Paciente eliminado!"]);
    }

    public function inactive(Request $request)
    {
        $model = Patient::find($request->id);
        $model->status = 0;
        $model->saveOrFail();
        return redirect()->route('patient.index')
        ->with('msg',"Paciente Inactivado!");
        
    }

    public function active(Request $request)
    {
        $model = Patient::find($request->id);
        $model->status = 1;
        $model->saveOrFail();
        return redirect()->route('patient.index')
        ->with('msg',"Paciente Activado!");
       
    }

    public function fichamedica(Request $request)
    {
        $patient = Patient::find($request->id);
        $appointment = Appointment::where(['patient_id'=>$patient->id ])->first();
        $appointments = Appointment::where(['patient_id'=>$patient->id ])->get();
 
        return view("patient.fichamedica", compact('patient','appointment','appointments'));
       
    }
}
