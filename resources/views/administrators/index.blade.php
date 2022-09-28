@section('title', "Administradores")

<x-app-layout>
<div class="container-fluid">
<div class="row invoice-card-row">
    <div class="col-md-6">
      <h2>Administradores</h2>
    </div>
    <div class="col-md-6" style="float: right" >
      <a class="btn btn-primary" href="{{ route('administrators.create') }}"> 
        Nuevo <span class="btn-icon-end"><i class="fa fa-plus"></i></span>
      </a>
    </div>
    


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<div class="">
  <div class="col-12">
      <div class="card">
         
          <div class="card-body">
              <div class="table-responsive">
                  <table id="example" class="display" style="min-width: 845px">
  <thead>
  <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="">Action</th>
 </tr>
  </thead>
  <tbody>
 @foreach ($data as $key => $administrator)
 
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $administrator->name }}</td>
    <td>{{ $administrator->email }}</td>
    <td>
      @if(!empty($administrator->getRoleNames()))
        @foreach($administrator->getRoleNames() as $v)
           <label class="btn btn-success btn-sm">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-primary" href="{{ route('administrators.edit',$administrator->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['administrators.destroy', $administrator->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</tbody>
<tfoot>
  <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="">Action</th>
 </tr>
  </tfoot>
</table>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</x-app-layout>
