<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function __invoke()
    {
        return view('doctor.index', ["menu" => Doctor::paginate(10)]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("doctor.index", ["menu" => Doctor::paginate(10)]);
    }

    public function create()
    {
        return view("doctor.create", ["country" => Country::where(["id"=>63])->get(),"state" => State::where(["country_id"=>63])->get(),"city" => City::whereIn('state_id', ['1022', '1023', '1024', '1025', '1026', '1027', '1028', '1029', '1030', '1031', '1032', '1033', '1034', '1035', '1036', '1037', '1038', '1039', '1040', '1041', '1042', '1043'])->orderBy("name","asc")->get()]);
    }

    /**
     * Retiros a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Doctor();
 
        $model->name = $request->name;
        $model->lastname = $request->lastname;
        $model->address = $request->address;
        $model->bloodtype = $request->bloodtype;
        $model->cellphone = $request->cellphone;
        $model->country = $request->country;
        $model->state = $request->state;
        $model->city = $request->city;
        $model->specialty = 1;
 
        $model->user_cre = auth()->user()->id;
        $model->status =1;
        $model->saveOrFail();
        return redirect()->route('doctor.index')
            ->with('msg','Doctor creado!');

    }

    public function edit(Doctor $doctor)
    {
        
        return view("doctor.edit", ["patient" => $doctor,"country" => Country::where(["id"=>63])->get(),"state" => State::where(["country_id"=>63])->get(),"city" => City::whereIn('state_id', ['1022', '1023', '1024', '1025', '1026', '1027', '1028', '1029', '1030', '1031', '1032', '1033', '1034', '1035', '1036', '1037', '1038', '1039', '1040', '1041', '1042', '1043'])->orderBy("name","asc")->get()        ]);
    }

    public function update(Request $request, $id)
    {
        //var_dump($id);
        $model = Doctor::find($id);
        $model->name = $request->name;
        $model->lastname = $request->lastname;
        $model->address = $request->address;
        $model->bloodtype = $request->bloodtype;
        $model->cellphone = $request->cellphone;
        $model->country = $request->country;
        $model->state = $request->state;
        $model->city = $request->city;
      
        $model->user_upd = auth()->user()->id;
       
        $model->saveOrFail();
        return redirect()->back()->with(['msg' => "Doctor actualizado!"]);
 
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Category $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //die(var_dump($doctor->id));
        $doctor->delete();
        return redirect()->route("doctor.index")->with(["msg" => "Doctor eliminado!"]);
    }

    public function inactive(Request $request)
    {
        $model = Doctor::find($request->id);
        $model->status = 0;
        $model->saveOrFail();
        return redirect()->route('doctor.index')
        ->with('msg',"Doctor Inactivado!");
        
    }

    public function active(Request $request)
    {
        $model = Doctor::find($request->id);
        $model->status = 1;
        $model->saveOrFail();
        return redirect()->route('doctor.index')
        ->with('msg',"Doctor Activado!");
       
    }
}
