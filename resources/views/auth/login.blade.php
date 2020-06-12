<!DOCTYPE html>
<html lang="es">

	<!--begin::Head-->
		@include("layouts.head")
	<!--end::Head-->

<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
			<div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(metronic/dist/assets/media/bg/bg-2.jpg);">
					<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
							<div class="d-flex flex-center mb-15">
								<a href="#">
									<img src="metronic/dist/assets/media/logos/logo-g-2.png" width="140px" alt="" class="img-fluid ml-10"/>
								</a>
							</div>

					<!--end::Login Header-->
						<div class="login-signin">
								<div class="mb-20">
									<h3 class="opacity-40 font-weight-normal">Inicia Sesion</h3>
									<p class="opacity-40">Ingresa tu usuario y contraseña</p>
								</div>

							<form method="POST" action="{{ route('login') }}" class="form" >
							@csrf
								
								<div class="form-group row">
                            		<input id="email" type="email" class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Usuario">
                                		@error('email')
                                    		<span class="invalid-feedback" role="alert">
                                        		<strong>{{ $message }}</strong>
                                    		</span>
                                		@enderror
								</div>
	   
								<div class="form-group row">   
                                	<input id="password" type="password" class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="contraseña">
									 	@error('password')
                                    		<span class="invalid-feedback" role="alert">
                                        		<strong>{{ $message }}</strong>
                                    		</span>
                                		@enderror
								</div>
								  
								<div class="form-group text-center mt-10">
									<button type="submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3">
                                    	Ingresar
									</button>
								</div>
							</form>
						</div>
					<!--end::Login Sign in form-->
				</div>
			</div>
		</div>
		<!--end::Login-->
	</div>

		<!--end::Main-->
		@include("layouts.scripts")
		<!--end::Page Scripts-->

</body>
	
</html>