
@if(empty($asesor))
{!! Form::open(['route' => 'asesor.store']) !!}
@else
{!! Form::model($asesor, ['route' => ['asesor.update', $asesor->id], 'method' => 'PUT']) !!}
@endif
<div class="card card-custom gutter-b example example-compact">
	<div class="card-header">
		<h3 class="card-title">
			Registra Asesor
		</h3>
  </div>
  <div class="card-body">
		<div class="form-group form-group-last">
      <div class="row">
        <div class="col-md-6">
          {{ Form::label('nombre')}}
          {{ Form::text('name', null, ['class'  => 'form-control', 'placeholder' => 'Ingrese Un nombre Completo']) }}
        </div>
        <div class="col-md-6">
          {{ Form::label('Correo Electronico')}}
          {{ Form::text('mail', null, ['class'  => 'form-control', 'placeholder' => 'Ingrese Un Correo Que este en Uso']) }}
        </div>
      </div>
      <div class="row mt-10">
        <div class="col-md-4">
          {{ Form::label('Celular')}}
          {{ Form::text('mobile', null, ['class'  => 'form-control', 'placeholder' => 'Ingrese Un Celular']) }}
        </div>
        <div class="col-md-4">
          {{ Form::label('Especialidades')}}
          {{ Form::text('specialty', null, ['class'  => 'form-control', 'placeholder' => 'Ingrese las especialidades']) }}
        </div>
        <div class="col-md-4">
          {{ Form::label('Observaciones')}}
          {{ Form::text('observation', null, ['class'  => 'form-control', 'placeholder' => 'Alguna observacion']) }}
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer">
		<button type="submit" class="btn btn-primary mr-2">Guardar</button>
		<button type="reset" class="btn btn-secondary">Cancelar</button>
	</div>
</div>
{!! Form::close() !!}