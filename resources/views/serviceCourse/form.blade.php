
@if(empty($serviceCourse))
{!! Form::open(['route' => 'service-course.store']) !!}
@else
{!! Form::model($serviceCourse, ['route' => ['service-course.update', $serviceCourse->id], 'method' => 'PUT']) !!}
@endif
<div class="card card-custom gutter-b example example-compact">
	<div class="card-header">
		<h3 class="card-title">
			Servicios ofrecidos por Asignaturas
		</h3>
  </div>
  <div class="card-body">
		<div class="form-group form-group-last">
      <div class="row">
        <div class="col-md-6">
          {{ Form::label('Elija Una Asignatura')}}
          {{ Form::select('course_id',$course, null, ['class'  => 'form-control','id' => 'courseId','placeholder' => 'Seleccione']) }}
        </div>
        <div class="col-md-6">
          {{ Form::label('Elija Un Servicio  ofertado por esta Asignatura')}}
          {{ Form::select('service_type_id',$serviceType, null, ['class'  => 'form-control', 'id' => 'servicios','placeholder' => 'Seleccione']) }}
        </div>

        <!-- este campo se llena mediante js con el nombre del servicio  -->
        <input hidden type="text" name="name" id="name">
      </div>
    </div>
  </div>
  <div class="card-footer">
		<button type="submit" class="btn btn-primary mr-2">Guardar</button>
		<button type="reset" class="btn btn-secondary">Cancelar</button>
	</div>
</div>
{!! Form::close() !!}