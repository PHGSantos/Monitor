@extends('adminlte::page')

@section('title', 'Monitor')

@section('content_header')
    <h1>Notificações</h1>
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
      <h3 class="card-title">Aviso: Ao marcar 'Habilitar' neste formulário, você será periodicamente notificado sobre o status de monitoramento dos sites cadastrados. Caso não queira ser notificado, selecione 'Desabilitar'.</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form role="form" method='get' action="{{route('notify_user')}}">

        <div class="row">
          <div class="col-sm-4">
            <!-- select -->
            <div class="form-group">
              <label>Deseja receber notificações por e-mail?</label>
              <select class="form-control" name='notification'>
                <option value='1'>Habilitar</option>
                <option value='0'>Desabilitar</option>
              </select>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Confirmar</button>
        
      </form>
    </div>
    <!-- /.card-body -->
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop