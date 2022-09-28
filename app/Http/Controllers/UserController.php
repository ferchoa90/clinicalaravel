<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('*')->paginate(5);
        return view('user.index', compact('users'));
    }
    public function appsetting()
    {
        //$settings = Setting::select('*')->paginate(1);
       // return view('layout.app', compact('settings'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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


            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->pass;
 
          
            $user->save();
            //die(var_dump($user));
            return redirect()->route('user.index')
            ->with('success','Usuario creado!');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
         return view('user.edit', compact('user'));
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
        $request->validate([
        'name' => 'required',
        'lastname' => 'required',
        'dni' => 'numeric|max:999999999999|min:111111111|required',
        'email' => 'required'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->dni = $request->dni;
        $user->email = $request->email;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $user['image']= $filename;
        }
        $user->save();
        return redirect()->route('user.index')
        ->with('success','Usuario actualizado.');
    }        


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')
        ->with('success','Usuario eliminado!');
    }
}
