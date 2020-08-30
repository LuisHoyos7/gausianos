	
		<!--end::Page Scripts-->
	 
	 	<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{ asset('metronic/dist/assets/plugins/global/plugins.bundle.js?v=7.0.4') }}"></script>
		<script src="{{ asset('metronic/dist/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.4') }}"></script>
		<script src="{{ asset('metronic/dist/assets/js/scripts.bundle.js?v=7.0.4') }}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('metronic/dist/assets/js/pages/custom/login/login-general.js?v=7.0.4') }}"></script>
		<script src="{{ asset('metronic/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.4') }}"></script>
		<script src="{{ asset('metronic/dist/assets/js/pages/widgets.js?v=7.0.4') }}"></script>
		<script src="{{ asset('metronic/dist/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.5') }}"></script>
		<script src="{{ asset('metronic/dist/assets/js/pages/crud/datatables/basic/headers.js?v=7.0.5') }}"></script>
		<script src="{{ asset('metronic/dist/assets/js/pages/crud/forms/widgets/select2.js?v=7.0.8') }}"></script>
		<script defer>
            $(document).ready(function() {
                $('#category').dataTable( {
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [ 
                {
                    extend: 'excelHtml5',
                    title: 'Reporte Estudiantes'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Reporte Estudiantes',
                    exportOptions: {
                    columns: [0,1]
                    }
                }
                ]
                });
            } );


			$(document).ready(function() {
                $('#customer').dataTable( {
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [ 
                {
                    extend: 'excelHtml5',
                    title: 'Reporte Estudiantes'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Reporte Estudiantes',
                    exportOptions: {
                    columns: [0,1]
                    }
                }
                ]
                });
            } );
        </script>

<script>
    $('#servicios').on('change', function (e) {

      var servicio =  $("#servicios option:selected").text();

      $('#name').val(servicio);
    })
</script>

<script>
    $("#categoryId").select2({
			placeholder: "Selecciona una categoria",
			language: "es",
			allowClear: true,
		});

        $("#courseId").select2({
			placeholder: "Selecciona un servicio",
			language: "es",
			allowClear: true,
		});


        $("#servicios").select2({
			placeholder: "Selecciona una asignatura",
			language: "es",
			allowClear: true,
		});

		$("#serviceType").select2({
			placeholder: "Selecciona un servicio",
			language: "es",
			allowClear: true,
		});
</script>

<script>
    $('.idEstimate').on('click', function (e) {
    var id = $(this).parents("tr").find('.idEstimate').val();
    $('#estimaId').val(id);
    })
</script>