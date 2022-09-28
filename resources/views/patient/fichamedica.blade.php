@section('title', "Ficha Médica" )

<x-app-layout>
    <div class="content p-2">
        <div class="pt-3 col-12">

            <div class="row">
                <div class="col-lg-12 margin-tb pr-30">
                    <div class="pull-left row">
                        
                    </div>
                </div>
            </div>
            @if ($message = Session::get('msg'))
            <div class="alert alert-success mt-2 mb-2 ml-0">
                <p class="m-0">{{ $message }}</p>
            </div>
            @endif
            <div class="row">
            <div class="col-6">
            <table class="table table-bordered mt-2 ">
                <thead >
                    <tr>
                        <th scope="col">ID</th>
                        <td scope="col" style="background: white; color:black;">{{$patient->id}}</th>
                        </tr>
                    <tr>
                        <th scope="col">Nombres</th>
                        <td scope="col" style="background: white; color:black;">{{$patient->name.' '.$patient->lastname}}</th>
                    </tr>
                    <tr>
                        <th scope="col">Dirección</th>
                        <td scope="col" style="background: white; color:black;">{{$patient->address}}</th>
                    </tr>
                    <tr>
                        <th scope="col">Celular</th>
                        <td scope="col" style="background: white; color:black;">{{$patient->cellphone}}</th>
                    </tr>
                    <tr>
                        <th scope="col">Correo electrónico</th>
                        <td scope="col" style="background: white; color:black;">{{$patient->email}}</th>
                    </tr>
                    <tr>
                        <th scope="col">Tipo de Sangre</th>
                        <td scope="col" style="background: white; color:black;">{{$patient->bloodtype}}</th>
                    </tr>
                    <tr>
                        <th scope="col">Fecha Ingreso</th>
                        <td scope="col" style="background: white; color:black;">{{$patient->created_at}}</th>
                    </tr>
                </thead>
               
     
            </table>
            
            </div>
            <div class="col-6">
            <table class="table table-bordered mt-2 ">
                <thead >
                    <tr>
                        <th scope="col">Última Cita</th>
                        <td scope="col" style="background: white; color:black;">{{$appointment->dateapp}}</th>
                        </tr>
                    <tr>
                        <th scope="col">Doctor</th>
                        <td scope="col" style="background: white; color:black;">{{$appointment->doctor->name.' '.$appointment->doctor->lastname}}</th>
                    </tr>
                    <tr>
                        <th scope="col">Hora Cita</th>
                        <td scope="col" style="background: white; color:black;">{{ '10:00' }}</th>
                    </tr>
                    <tr>
                        <th scope="col">Patología</th>
                        <td scope="col" style="background: white; color:black;">{{ 'ALERGIA' }}</th>
                    </tr>
                    <tr>
                        <th scope="col">Receta</th>
                        <td scope="col" style="background: white; color:black;">{{ 'IBUPROFENO 500ML <br> LORATADINA 200MG' }}</th>
                    </tr>
                    <tr>
                        <th scope="col">Observaciones</th>
                        <td scope="col" style="background: white; color:black;">{{ 'AGENDAR CITA EN 15 DÍAS' }}</th>
                    </tr>
                </thead>
               
     
            </table>
            
            </div>
            </div>
            <table class="table table-bordered mt-2 ">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha Cita</th>
                    <th>Nombres</th>
                    <th>Teléfono</th>
                    <th>Doctor</th>
                    <th>Estatus</th>
                     
                </tr>
            </thead>
    
                @foreach ($appointments as $user)
                <tbody>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->dateapp }}</td>
                    <td>{{ $user->patient->name.' '.$user->patient->lastname }}</td>
                    <td>{{ $user->patient->cellphone }}</td>
                    <td>{{ $user->doctor->name.' '.$user->doctor->lastname }}</td>
                    <td>@if ($user->statusapp==1) <span class="badge rounded-pill bg-primary ">AGENDADA</span>  @endif
                        @if ($user->statusapp==3) <span class="badge rounded-pill bg-warning ">REAGENDADA</span>  @endif
                        @if ($user->statusapp==5) <span class="badge rounded-pill bg-danger ">CANCELADA</span>  @endif
                        @if ($user->statusapp==2) <span class="badge rounded-pill bg-success ">EN ATENCIÓN</span>  @endif
                        @if ($user->statusapp==4) <span class="badge rounded-pill bg-secondary ">ATENDIDA</span>  @endif
                    </td>
             
                    
                </tr>
            </tbody>
                @endforeach
            </table>
      

        </div>
    </div>

   
</x-app-layout>