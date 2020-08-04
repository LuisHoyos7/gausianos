<div class="card card-custom gutter-b">
	<div class="card-header flex-wrap py-3">
		<div class="card-title">
			<h3 class="card-label">
				Cotizaciones 
				<span class="d-block text-muted pt-2 font-size-sm">Listado general de las cotizaciones</span>
			</h3>
		</div>
		<div class="card-toolbar">
            <a href="{{route('estimate.create')}}" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:/metronic/themes/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                        </g>
                    </svg><!--end::Svg Icon-->
                </span>	Nuevo
            </a>
        <!--end::Button-->
		</div>
	</div>
	<div class="card-body mb-10 px-20">
		<!--begin: Datatable-->
		<div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-head-custom table-hover table-vertical-center" id="category" role="grid" aria-describedby="kt_datatable_info">
			            <thead class="thead-light">
                            <tr>
                                <th>Cotizacion</th>
                              <!--  <th>Categoria</th> -->
                                <th>Asignatura</th>
                                <th>Tipo Servicio</th>
                                <th>Tipo de Trabajo</th>
                                <th>Cliente</th>
                                <th>Fecha Entrega</th>
                                <th>Hora Entrega</th>
                                <!--<th>Temas</th>
                                <th>Paginas</th>
                                <th>Normas</th>
                                <th>Descripcion</th> -->
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($estimates as $estimate)
                            <tr>
                                <td>{{$estimate->id}}</td>
                               
                              <!--  <td> 
                                  {{--  @if(!empty($estimate->course_id))
                                    {{$estimate->course->category->name}} 
                                    @else
                                    Otros - Trabajos Escritos
                                    @endif --}}
                                </td> -->
                                <td>
                                    @if(!empty($estimate->course_id))
                                    {{$estimate->course->name}}  
                                    @endif
                                </td> 
                                <td>
                                    @if(!empty($estimate->work_type_id))
                                    {{$estimate->workType->serviceType->name}}
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($estimate->work_type_id))
                                    {{$estimate->workType->name}}
                                    @endif
                                </td>
                                <td>{{$estimate->customer->user->name}}</td>
                                <td>{{$estimate->delivery_date}}</td>
                                <td>{{$estimate->delivery_hour}}</td>
                               {{--} <td>{{$estimate->theme}}</td>
                                <td>{{$estimate->sheets_number}}</td>
                                <td>{{$estimate->standard}}</td>
                                <td>{{$estimate->description}}</td> --}}
                                <td>                                        
                                    {{Form::open(['route' => ['estimate.destroy', $estimate->id], 'method' => 'DELETE'])}}
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <a href="#" class="btn btn-icon btn-outline-primary btn-shadow font-weight-bold" data-toggle="tooltip" data-theme="dark" title="Ver Categoria">
                                                <i class="flaticon-eye"></i>
                                            </a>
                                            <a href="{{route('estimate.edit', $estimate->id) }}" class="btn btn-icon btn-outline-success btn-shadow font-weight-bold" data-toggle="tooltip" data-theme="dark" title="Editar Categoria">
                                                <i class="flaticon-doc"></i>
                                            </a>
                                            <button type="submit" class="btn btn-icon btn-outline-danger btn-shadow font-weight-bold" data-toggle="tooltip" data-theme="dark" title="Eliminar Categoria">
                                                <i class="flaticon-delete-1"></i>
                                            </button>
                                        </div>
                                    {{Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
	    </div><!--end: Datatable-->
    </div>
</div>