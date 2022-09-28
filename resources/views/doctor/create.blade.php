@section('title', "Crear Doctor" )

<x-app-layout>
    <div class="row">
        <div class="col-12">

            <form method="POST" action="{{route('doctor.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row pb-5 pt-5 pl-3">
                    <div class="col-lg-12 margin-tb pr-30">
                        <div class="pull-left row">
                            <div class="d-flex justify-content-between">
                                <h4 class="d-flex font-b"></h4>
                                <a class="btn btn-primary" href="{{ route('doctor.index') }}">
                                    <i class="fa fa-undo"></i> Regresar
                                </a>
                            </div>
                        </div>
                    </div>
                    @if (\Session::has('msg'))
                    <div class="alert alert-success m-2">
                        <ul style="" class="p-0 m-0">
                            <li style="list-style: none;">{!! \Session::get('msg') !!}</li>
                        </ul>
                    </div>
                    @endif
                    <div class="form-group row">
                
                        <div class="col-6">
                            <label class="label">*Nombres:</label>
                            <input required autocomplete="off" name="name" class="form-control" type="text"
                                placeholder="Nombres del doctor">
                        </div>
                        <div class="col-6">
                            <label class="label">*Apellidos:</label>
                            <input required autocomplete="off" name="lastname" class="form-control" type="text"
                                placeholder="Apellido del doctor">
                        </div>
                        <div class="col-6">
                            <label class="label">*Dirección:</label>
                            <input required autocomplete="off" name="address" class="form-control" type="text"
                                placeholder="Dirección">
                        </div>
                        <div class="col-6">
                            <label class="label">*Tipo de Sangre:</label>
                            <input required autocomplete="off" name="bloodtype" class="form-control" type="text"
                                placeholder="Tipo de Sangre">
                        </div>

                        <div class="col-6">
                            <label class="label">*Celular:</label>
                            <input required autocomplete="off" name="cellphone" class="form-control" type="text"
                                placeholder="Celular">
                        </div>
 
         
                        <div class="col-6">
                            <label class="label">*País:</label>
                            <select class="form-control" name="country">
                                <option value="0">Seleccionar País</option>
                                
                                @foreach($country as $sup)
                                <option value="{{$sup->id}}">{{$sup->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6">
                            <label class="label">*Provincia:</label>
                            <select class="form-control" name="state">
                                <option value="0">Seleccionar Provincia</option>
                                
                                @foreach($state as $sup)
                                <option value="{{$sup->id}}">{{$sup->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6">
                            <label class="label">*Ciudad:</label>
                            <select class="form-control" name="city">
                                <option value="0">Seleccionar Ciudad</option>
                                
                                @foreach($city as $sup)
                                <option value="{{$sup->id}}">{{$sup->name}}</option>
                                @endforeach
                            </select>
                        </div>
             

                       
                    </div>
                    @method('POST')
                    
                    <div class="form-group  m-2">
                        <div class="col">
                       
                            <button type="submit" class="btn btn-primary ml-3">
                                <i class="fa fa-save"></i>&nbsp;Grabar</button>
                                </div>                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>