@extends('adminlte::page')

@section('title', 'Monitor')

@section('content_header')
    <h1>Lista de Sites</h1>
@stop

@section('content')
    <p>Todos os sites que estão sendo monitorados neste momento.</p>
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Sites</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>URL</th>
                    <th>Status</th>
                    <th>Verificado em</th>
                    <th>Ações
                  </tr>
                </thead>
                <tbody>
                    @foreach($objects as $object)
                    <tr>
                        <td> {{$object->id}} </td>
                        <td> {{$object->name}} </td>
                        <td> {{$object->url}} </td>
                        @if ($object->status == '200')
                        <td style='color:green'> Ativo </td>
                        @else
                        <td style='color:red'> Fora do Ar </td>
                        @endif
                        <td> {{$object->moment}} </td>
                        <td>
                          <button type="button" class="btn btn-primary btn-sm daterange" data-toggle="tooltip" title="Date range"
                          onclick="location.href='{{url('edit_site/'.$object->id)}}'">
                            <i class="fas fa-edit"></i>
                          </button>
                          <button type="button" class="btn btn-danger btn-sm daterange" data-toggle="tooltip" title="Date range"
                          onclick="location.href='{{url('delete_site/'.$object->id)}}'">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop