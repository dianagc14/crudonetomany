@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Usuarios y Direcciones</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('direccion.create') }}" class="btn btn-info" >Añadir Direccion</a>
              <a href="{{ route('usuario.create') }}" class="btn btn-info" >Añadir Usuario</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>ID Usuario</th>
               <th>Calle</th>
               <th>Colonia</th>
               <th>Delegacion</th>
               <th>Numero</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($direccions->count())  
              @foreach($direccions as $direccion)  
              <tr>
                <td>{{$direccion->id}}</td>
                <td>{{$direccion->calle}}</td>
                <td>{{$direccion->colonia}}</td>
                <td>{{$direccion->delegacion}}</td>
                <td>{{$direccion->numero}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('DireccionController@edit', $direccion->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('DireccionController@destroy', $direccion->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
      
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $direccions->links() }}
  
    </div>
  </div>
</section>

@endsection
