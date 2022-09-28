@section('title', "Usuarios")

<x-app-layout>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left row">
                    <div class="d-flex justify-content-between">
                        <h3 class="d-flex"></h3>
                        <a class="btn btn-primary" href="{{ route('user.create') }}">
                            <i class="fa fa-plus"></i> Crear Usuario
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
                <th>Nombres</th>
                <th>Email</th>
                <th>F. Creación</th>
                <th width="160px">Actions</th>
            </tr>
        </thead>

            @foreach ($users as $user)
            <tbody>
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
         
                <td>
                    <form action="{{ route('user.destroy',$user->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
            @endforeach
        </table>
        {{$users->links()}}
    </div>
</x-app-layout>