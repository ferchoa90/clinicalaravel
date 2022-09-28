@section('title', "Citas Médicas")

<x-app-layout>
    <div class="content mt-2 p-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left row">
                    <div class="d-flex justify-content-between">
                        <h3 class="d-flex"></h3>
                        <a class="btn btn-primary" href="{{ route('appointment.create') }}">
                            <i class="fa fa-plus"></i> Crear Cita
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered mt-2 ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Fecha Cita</th>
                <th>Nombres</th>
                <th>Teléfono</th>
                <th>Doctor</th>
                <th>Estatus</th>
                <th width="160px">Actions</th>
            </tr>
        </thead>

            @foreach ($appointment as $user)
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
         
                <td>
                    <div class="row col">
                        <div class="d-flex ">
                            @if ($user->statusapp == 1)
                            <a class="btn btn-info btn-xs  " href="{{route('appointment.edit',[$user])}}">
                                <i class="fa fa-edit"></i>
                            </a>&nbsp;&nbsp;&nbsp;
                            @endif

                             
                            @if ($user->statusapp == 1)
                            <form action="{{route('appointment.success', [$user])}}" method="post">
                                @csrf
                                <button class="btn btn-secondary btn-xs" type="submit"
                                    title="Atender cita">
                                    <!--<i class="fa-solid fa-arrows-rotate"></i>-->
                                    <i class="fa fa-toggle-off"></i>
                                </button>
                            </form>&nbsp;&nbsp;&nbsp;
                            <form action="{{route('appointment.cancel', [$user])}}" method="post">
                                @csrf
                                <button class="btn btn-primary btn-xs" type="submit" title="Reagendar Cita">
                                    <!--<i class="fa-solid fa-arrows-rotate"></i>-->
                                    <i class="fa fa-toggle-on"></i>
                                </button>
                            </form>&nbsp;&nbsp;&nbsp;
                            @endif
                            @if ($user->statusapp == 2)

                            <form action="{{route('appointment.successok', [$user])}}" method="post">
                                @csrf
                                <button class="btn btn-primary btn-xs" type="submit" title="Terminar Atención Cita">
                                    <!--<i class="fa-solid fa-arrows-rotate"></i>-->
                                    <i class="fa fa-toggle-on"></i>
                                </button>&nbsp;&nbsp;&nbsp;
                            </form>

                           
                            @endif
                            @if ($user->statusapp != 4 &&  $user->statusapp != 5)
                            <form action="{{route('patient.destroy', [$user])}}" method="post">
                                @method("delete")
                                @csrf
                                <button class="btn btn-danger btn-xs" type="submit" title="Eliminar Cita">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            @endif
                            
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
            @endforeach
        </table>
        {{$appointment->links()}}
    </div>
</x-app-layout>