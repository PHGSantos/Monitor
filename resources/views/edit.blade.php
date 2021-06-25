@extends('adminlte::page')

@section('title', 'Monitor')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
	{{ session('status') }}
</div>
@elseif(session('failed'))
<div class="alert alert-danger" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
	{{ session('failed') }}
</div>
@endif

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Editar Site</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method='get' action="{{route('atualizar',$registro->id)}}">
        @csrf
      <div class="card-body">
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
          <label for="exampleInputEmail1">URL</label>
          <input name ='url' type="text" class="form-control" id="url" placeholder="https://www.site.com/" value={{$registro->url}}>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Nome/Apelido</label>
          <input name='name' type="text" class="form-control" id="name" placeholder="MeuSite" value={{$registro->name}}>
        </div>
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Adicionar</button>
      </div>
    </form>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop