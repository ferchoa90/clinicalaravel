<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointment = Appointment::select('*')->paginate(5);
        return view('appointment.index', compact('appointment'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patient = Patient::select('*')->get();
        $doctor = Doctor::select('*')->get();
        return view('appointment.create', compact('patient','doctor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $date=str_replace("/","-",$request->dateapp);
          
            $appointment = new Appointment;
            $appointment->doctor_id = $request->doctor;
            $appointment->patient_id = $request->patient;
            $appointment->dateapp = $date;
            $appointment->user_cre = auth()->user()->id;
            $appointment->status = 1;
            $appointment->statusapp = 1;
            
 
          
            $appointment->save();
            
            return redirect()->route('appointment.index')
            ->with('success','Cita creada!');
        }
            /**
            * Display the specified resource.
            *
            * @param  \App\user  $user
            * @return \Illuminate\Http\Response
            */
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function success(Request $request)
    {
        $model = Appointment::find($request->id);
        $model->statusapp = 2;
        $model->saveOrFail();
        return redirect()->route('appointment.index')
        ->with('msg',"Cita en atención!");
        
    }

    public function unsuccess(Request $request)
    {
        $model = Appointment::find($request->id);
        $model->statusapp = 3;
        $model->saveOrFail();
        return redirect()->route('appointment.index')
        ->with('msg',"Cita Reagendada!");
        
    }

    public function cancel(Request $request)
    {
        $model = Appointment::find($request->id);
        $model->statusapp = 5;
        $model->saveOrFail();
        return redirect()->route('appointment.index')
        ->with('msg',"Cita Cancelada!");
        
    }

    public function successok(Request $request)
    {
        $model = Appointment::find($request->id);
        $model->statusapp = 4;
        $model->saveOrFail();
        return redirect()->route('appointment.index')
        ->with('msg',"Cita Atendida!");
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $patient = Patient::select('*')->get();
        $doctor = Doctor::select('*')->get();
         return view('appointment.edit', compact('appointment','patient','doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 
        $appointment = Appointment::find($id);
      
 
        $appointment->doctor_id = $request->doctor;
        $appointment->note = $request->note;
        $appointment->dateapp = $request->dateapp;
        $appointment->statusapp = $request->statusapp;
       
        $appointment->save();
        return redirect()->route('appointment.index')
        ->with('success','Cita actualizada.');
    }        


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $user)
    {
        $user->delete();
        return redirect()->route('appointment.index')
        ->with('success','Usuario eliminado!');
    }
}
