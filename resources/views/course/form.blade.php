
@if(empty($course))
{!! Form::open(['route' => 'course.store']) !!}
@else
{!! Form::model($course, ['route' => ['course.update', $course->id], 'method' => 'PUT']) !!}
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
          {{ Form::label('Nombre asignatura')}}
          {{ Form::text('name', null, ['class'  => 'form-control', 'placeholder' => 'Ingesa el nombre del curso']) }}
        </div>
        <div class="col-md-6">
          {{ Form::label('Elija Una Categoria')}}
          {{ Form::select('category_id',$category, null, ['class'  => 'form-control','id' => 'categoryId','placeholder' => 'seleccione una categoria', 'required']) }}
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



