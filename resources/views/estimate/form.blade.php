
@if(empty($category))
{!! Form::open(['route' => 'category.store']) !!}
@else
{!! Form::model($category, ['route' => ['category.update', $category->id], 'method' => 'PUT']) !!}
@endif
<div class="card card-custom gutter-b example example-compact">
	<div class="card-header">
		<h3 class="card-title">
			Categorias
		</h3>
  </div>
  <div class="card-body">
		<div class="form-group form-group-last">
      <div class="row">
        <div class="col-md-8 offset-2">
          {{ Form::label('Nombre de la categoria')}}
          {{ Form::text('name', null, ['class'  => 'form-control', 'placeholder' => 'Ingesa el nombre de la categoria']) }}
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



