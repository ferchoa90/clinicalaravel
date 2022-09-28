@section('title', "Crear Cita médica")

<x-app-layout>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb pr-30">
                <div class="pull-left row">
                    <div class="d-flex justify-content-between">
                        <h4 class="d-flex font-b"></h4>
                        <a class="btn btn-primary" href="{{ route('appointment.index') }}">
                            <i class="fa fa-undo"></i> Regresar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('appointment.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label class="label">*Paciente:</label>
                    <select class="form-control" name="patient">
                        <option value="0">Seleccionar Paciente</option>
                        
                        @foreach($patient as $sup)
                        <option value="{{$sup->id}}">{{$sup->name.' '.$sup->lastname}}</option>
                        @endforeach
                    </select>
                </div>
                
                 
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Fecha Cita:</strong>
                        <input type="date" name="dateapp" class="form-control" placeholder="User Email" value="{{ old('dateapp') }}">
                        @error('dateapp')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                 
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label class="label">*Doctor:</label>
                    <select class="form-control" name="doctor">
                        <option value="0">Seleccionar Doctor</option>
                        
                        @foreach($doctor as $sup)
                        <option value="{{$sup->id}}">{{$sup->name.' '.$sup->lastname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Nota:</strong>
                        <input type="text" name="note" class="form-control" placeholder="Nota" value="{{ old('note') }}">
                        @error('note')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12col-md-12">

                    <div class="col m-2">
                       
                        <button type="submit" class="btn btn-primary ml-3">
                            <i class="fa fa-save"></i>&nbsp;Guardar</button>
                            </div>                    
                </div>  
                </div>   

            </div>
        </form>
    </div>
</x-app-layout>