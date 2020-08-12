
@if(empty($workType))
{!! Form::open(['route' => 'work-type.store']) !!}
@else
{!! Form::model($workType, ['route' => ['work-type.update', $workType->id], 'method' => 'PUT']) !!}
@endif
<div class="card card-custom gutter-b example example-compact">
	<div class="card-header">
		<h3 class="card-title">
			Agregar Cursos
		</h3>
  </div>
  <div class="card-body">
		<div class="form-group form-group-last">
      <div class="row">
        <div class="col-md-6">
          {{ Form::label('Nombre Tipo Trabajo')}}
          {{ Form::text('name', null, ['class'  => 'form-control', 'placeholder' => 'Ingesa el nombre del tipo de trabajo']) }}
        </div>
        <div class="col-md-6">
          {{ Form::label('Elija Un Tipo de Servicio')}}
          {{ Form::select('service_type_id',$serviceType, null, ['class'  => 'form-control','id' => 'serviceType','placeholder' =>'seleccione el tipo de servicio']) }}
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



