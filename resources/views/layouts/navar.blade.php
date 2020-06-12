<div id="kt_header" class="header  header-fixed ">
	<!--begin::Container-->
	<div class=" container-fluid  d-flex align-items-stretch justify-content-between">
		<!--begin::Header Menu Wrapper-->
			<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
				<!--begin::Header Menu-->
				<div id="kt_header_menu" class="header-menu header-menu-mobile  header-menu-layout-default ">
					<!--begin::Header Nav-->
					<ul class="menu-nav ">
					</ul>
					<!--end::Header Nav-->
				</div>
				<!--end::Header Menu-->
			</div>
			<!--end::Header Menu Wrapper-->
		
		<!--begin::Topbar-->
		<div class="topbar">
		    <!--begin::Notifications-->
		    	<div class="dropdown">
		            <!--begin::Toggle-->
		                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
		        			<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
								<span class="svg-icon svg-icon-xl svg-icon-primary"><!--begin::Svg Icon | path:/metronic/themes/metronic/theme/html/demo1/dist/assets/media/svg/icons/Code/Compiling.svg-->
    								<i class="flaticon2-gear"></i>	
								</span>		                        
								<span class="pulse-ring">
								</span>
		        			</div>
		                </div>
		            <!--end::Toggle-->

		            <!--begin::Dropdown-->
		    		<div class="dropdown-menu p-0 m-0 dropdown-menu-right  dropdown-menu-lg">
						<!--begin::Content-->
						<div class="tab-content">
    						<!--begin::Tabpane-->
    						<div class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">
        						<!--begin::Scroll-->
        						<div class="scroll pr-7 mr-n7 ps" data-scroll="true"  style="height: 60px; overflow: hidden;">
            						<!--begin::Item-->
            						<div class="d-flex align-items-center mb-6">
                						<!--begin::Text-->
                						<div class="d-flex flex-column font-weight-bold">
											{{ Auth::user()->name }} <span class="caret"></span>  
                    						<a class="dropdown-item btn btn-primary" href="{{ route('logout') }}"
                                       			onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        		{{ __('Salir de la APP') }}
                                 			</a>

                                    		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        		@csrf
                                    		</form>
                						</div>
                						<!--end::Text-->
            						</div>
									<!--end::Item-->
								</div>
        						<!--end::Nav-->
    						</div>
						<!--end::Tabpane-->
						</div>
					<!--end::Content-->
					</div>
				<!--end::Dropdown-->
				</div>
			<!--end::Notifications-->
			</div>
		<!--end::Topbar-->
		</div>
	<!--end::Container-->
</div>

