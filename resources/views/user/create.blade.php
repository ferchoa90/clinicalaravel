@section('title', "Crear Usuario")

<x-app-layout>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb pr-30">
                <div class="pull-left row">
                    <div class="d-flex justify-content-between">
                        <h4 class="d-flex font-b"></h4>
                        <a class="btn btn-primary" href="{{ route('user.index') }}">
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
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Nombres:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                 
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Correo electrónico:</strong>
                        <input type="email" name="email" class="form-control" placeholder="User Email" value="{{ old('email') }}">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                 
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Contraseña:</strong>
                        <input type="password" name="pass" class="form-control">
                        @error('pass')
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