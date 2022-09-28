@section('title', "Doctores" )

<x-app-layout>
    <div class="content p-2">
        <div class="pt-3 col-12">

            <div class="row">
                <div class="col-lg-12 margin-tb pr-30">
                    <div class="pull-left row">
                        <div class="d-flex justify-content-between">
                            <h4 class="d-flex font-b"></h4>
                            <a class="btn btn-primary" href="{{ route('doctor.create') }}">
                                <i class="fa fa-plus"></i> Crear Doctor
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('msg'))
            <div class="alert alert-success mt-2 mb-2 ml-0">
                <p class="m-0">{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered mt-2 ">
                <thead class=" ">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Tipo S</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Fecha C.</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menu as $paciente)
                    <tr>

                        <th scope="row">{{$paciente->id}}</th>
                        <td>{{$paciente->name}}</td>
                        <td>{{$paciente->lastname}}</td>
                        <td>{{$paciente->bloodtype}}</td>
                        <td>{{$paciente->cellphone}}</td>
    
                        <td>{{@$paciente->created_at}}</td>
                        <td> @if ($paciente->status == 1)
                            <span class="badge rounded-pill bg-primary ">ACTIVO</span>
                            @else
                            <span class="badge rounded-pill bg-secondary">INACTIVO</span>
                            @endif
                        </td>
                        <td class="">
                            <div class="row col">
                                <div class="d-flex ">
                                    <a class="btn btn-info btn-xs  " href="{{route('doctor.edit',[$paciente])}}">
                                        <i class="fa fa-edit"></i>
                                    </a>&nbsp;&nbsp;&nbsp;
                                     
                                    @if ($paciente->status == 1)
                                    <form action="{{route('doctor.inactive', [$paciente])}}" method="post">
                                        @csrf
                                        <button class="btn btn-secondary btn-xs" type="submit"
                                            title="Inactivar Paciente">
                                            <!--<i class="fa-solid fa-arrows-rotate"></i>-->
                                            <i class="fa fa-toggle-off"></i>
                                        </button>
                                    </form>&nbsp;&nbsp;&nbsp;
                                    @else
                                    <form action="{{route('doctor.active', [$paciente])}}" method="post">
                                        @csrf
                                        <button class="btn btn-primary btn-xs" type="submit" title="Activar Paciente">
                                            <!--<i class="fa-solid fa-arrows-rotate"></i>-->
                                            <i class="fa fa-toggle-on"></i>
                                        </button>&nbsp;&nbsp;&nbsp;
                                    </form>
                                    @endif
                                    <form action="{{route('doctor.destroy', [$paciente])}}" method="post">
                                        @method("delete")
                                        @csrf
                                        <button class="btn btn-danger btn-xs" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            {!! $menu->links() !!}

        </div>
    </div>

   
</x-app-layout>