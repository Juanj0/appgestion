<!DOCTYPE html>
<html>
	<head>
		<!-- Title here -->
		<title>AppGestion</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
		{!! Html::style( asset('theme/css/bootstrap.min.css')) !!}
		<!-- jQuery prettyPhoto -->
		{!! Html::style( asset('theme/css/prettyPhoto.css')) !!}
		<!-- Font awesome CSS -->
		{!! Html::style( asset('theme/css/font-awesome.min.css')) !!}
		<!-- jQuery gritter -->
		{!! Html::style( asset('theme/css/jquery.gritter.css')) !!}
		<!-- Custom Color CSS -->
		{!! Html::style( asset('theme/css/less-style.css')) !!}
		<!-- Custom CSS -->
		{!! Html::style( asset('theme/css/style.css')) !!}
		
    {!! Html::style( asset('plugins/bootstrap/css/select2.css')) !!}
		<!-- Favicon -->
		<link rel="shortcut icon" href="#">
	</head>
	
	<body>

		<div class="outer">
			
			<!-- Sidebar starts -->
			<div class="sidebar">
			
				<div class="sidey">
			
					<!-- Logo -->
					<div class="logo">
						<h1><a href="index.html"><i class="fa fa-line-chart br-lblue"></i> Gestión <span>By Joel J. Barrios</span></a></h1>
					</div>
					
					<!-- Sidebar navigation starts -->
					
					<!-- Responsive dropdown -->
					<div class="sidebar-dropdown"><a href="#" class="br-red"><i class="fa fa-bars"></i></a></div>
					
					<div class="side-nav">
					
						<div class="side-nav-block">
							<!-- Sidebar heading -->
							<h4>Menú Principal</h4>
							<!-- Sidebar links -->
							<ul class="list-unstyled">
								<li><a href="index.html"><i class="fa fa-desktop"></i> Panel de Control</a></li>
								<li><a href="widgets.html"><i class="fa fa-bullseye"></i> Clientes</a></li>
								<li class="has_submenu">
									<a href="#"><i class="fa fa-file"></i> Cotizaciones <span class="nav-caret fa fa-caret-down"></span></a>
									<!-- Submenu -->
									<ul class="list-unstyled">
										<li><a href="calendar.html"><i class="fa fa-angle-double-right"></i> Nuevas</a></li>
										<li><a href="errorlog.html"><i class="fa fa-angle-double-right"></i> Ver Todas</a></li>
									</ul>
								</li>
								<li class="has_submenu">
									<a href="#"><i class="fa fa-file"></i> Facturas <span class="nav-caret fa fa-caret-down"></span></a>
									<!-- Submenu -->
									<ul class="list-unstyled">
										<li><a href="calendar.html"><i class="fa fa-angle-double-right"></i> Nuevas</a></li>
										<li><a href="errorlog.html"><i class="fa fa-angle-double-right"></i> Ver Todas</a></li>
									</ul>
								</li>
						</div>
						
						<div class="side-nav-block">
							<h4>Menú de Usuario</h4>
							<ul class="list-unstyled">
								<li><a href="login.html"><i class="fa fa-sign-in"></i> Cerrar Sesión</a></li>
							</ul>
						</div>
						
						
					</div>
					
					<!-- Sidebar navigation ends -->
					
				</div>
			</div>
			<!-- Sidebar ends -->
			
			<!-- Mainbar starts -->
			<div class="mainbar">
			
				<!-- Mainbar head starts -->
				<div class="main-head">
					<div class="container">
						<div class="row">
							<div class="col-md-3 col-sm-4 col-xs-6">
								<!-- Page title -->
								<h2><i class="fa fa-desktop lblue"></i> Dashboard</h2>
							</div>
							
							<div class="col-md-3 col-sm-4 col-xs-6">
								<!-- Search block -->
								<div class="head-search">
									<form class="form" role="form">
										<div class="input-group">
										  <input type="text" class="form-control" placeholder="Search...">
										  <span class="input-group-btn">
											<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
										  </span>
										</div>
									</form>
								</div>
							</div>
							
							<div class="col-md-3 col-sm-4 hidden-xs">
								<!-- Notifications -->
								<div class="head-noty text-center">
									
									  <!-- Notifications -->
									  <div class="dropdown">
										  <a href="#" id="notifications" data-toggle="dropdown" class="mhead-icon" ><i class="fa fa-bell"></i></a>
										  <!-- Dropdown -->
										  <ul class="dropdown-menu" role="button" aria-labelledby="notifications">
											
											<!-- Dropdown menu head -->
											<li class="dropdown-head">
												Notificaciones 
											</li>
											<!-- Content -->
											<li><a href="#">
												<!-- Colored icon with text and time -->
												<i class="fa fa-user"></i> Sin Notificaciones<div class="clearfix"></div>
											</a></li>

											<li class="dropdown-foot text-center">
												<a href="#">Ver Todas</a>
											</li>
											
										  </ul>
									  </div>
									
									  <!-- Messages -->
									  <div class="dropdown">
										  <a href="#" id="messages" data-toggle="dropdown" class="mhead-icon" ><i class="fa fa-envelope"></i></a>
										  <ul class="dropdown-menu" role="button" aria-labelledby="messages">
											
											<!-- Dropdown menu head -->
											<li class="dropdown-head">
												Mensajes <span class="label label-danger pull-right">5</span>
											</li>
											<!-- Content -->
											<li><a href="#">
												Sin Mensajes
												<div class="clearfix"></div>
											</a></li>

											<li class="dropdown-foot text-center">
												<a href="#">Ver Todos</a>
											</li>
											
										  </ul>
									  </div>
									  
									  <!-- Users -->
									  <div class="dropdown">
										  <a href="#" id="users" data-toggle="dropdown" class="mhead-icon" ><i class="fa fa-user"></i></a>
										  <!-- Dropdown -->
										  <ul class="dropdown-menu drop-users" role="button" aria-labelledby="users">
											
											<!-- Dropdown menu head -->
											<li class="dropdown-head">
												Usuarios <span class="label label-success pull-right">5</span>
											</li>
											<!-- Content -->
											<li><a href="#">
												<!-- User image -->
												<img src="img/user1.png" alt="" class="img-responsive img-circle" />
												<!-- User details -->
												<div class="duser-content">
													Joel Barios
													<span>Usuario Administrador</span>
												</div>
												<div class="clearfix"></div>
											</a></li>
											
											<li class="dropdown-foot text-center">
												<a href="#">Ver Todos</a>
											</li>
											
										  </ul>
									  </div>
									  
								</div>
								<div class="clearfix"></div>
							</div>
							
							
							<div class="col-md-3 hidden-sm hidden-xs">
								<!-- Head user -->
								<div class="head-user dropdown pull-right">
									<a href="#" data-toggle="dropdown" id="profile">
										<!-- Icon 
										<i class="fa fa-user"></i>  -->
										
										<img src="img/user2.png" alt="" class="img-responsive img-circle"/>
										
										<!-- User name -->
										ashokram <span class="label label-danger">5</span> 
										<i class="fa fa-caret-down"></i> 
									</a>
									<!-- Dropdown -->
									<ul class="dropdown-menu" aria-labelledby="profile">
									    <li><a href="#">View/Edit Profile <span class="badge badge-info pull-right">6</span></a></li>
										<li><a href="#">Change Settings</a></li>
										<li><a href="#">Messages <span class="badge badge-danger pull-right">5</span></a></li>
										<li><a href="#">Sign Out</a></li>
									</ul>
								</div>
								<div class="clearfix"></div>
							</div>

						</div>	
					</div>
					
				</div>
				
				<!-- Mainbar head ends -->
				
				<div class="main-content">
					<div class="container">
										
						<div class="page-content">
						
							<!-- Heading -->
							<div class="single-head">
								<!-- Heading -->
								<h3 class="pull-left"><i class="fa fa-desktop purple"></i> Titulo de la Página</h3>
								<!-- Bread crumbs -->
								<div class="breads pull-right">
									<strong>Nav</strong> : <a href="#">Home</a> / <a href="#">Sign</a> / Home
								</div>
								<div class="clearfix"></div>
							</div>
							
					        @include('flash::message')
					        @yield('content')
							
						</div>
						
					</div>
				</div>
				
			</div>
			<!-- Mainbar ends -->
			
			<div class="clearfix"></div>
		</div>
		
		<!-- Javascript files -->
		<!-- jQuery -->
		{!! Html::script( asset('theme/js/jquery.js')) !!}
		    {!! Html::script( asset('plugins/jquery/js/select2.js')) !!}

		<!-- Bootstrap JS -->
		{!! Html::script( asset('theme/js/bootstrap.min.js')) !!}
		<!-- jQuery UI -->
		{!! Html::script( asset('theme/js/jquery-ui.min.js')) !!}
		<!-- Date Time Picker JS -->
		{!! Html::script( asset('theme/js/bootstrap-datetimepicker.min.js')) !!}
		<!-- Bootstrap wysihtml5 JS -->		
		{!! Html::script( asset('theme/js/wysihtml5-0.3.0.js')) !!}
		{!! Html::script( asset('theme/js/prettify.js')) !!}
		{!! Html::script( asset('theme/js/bootstrap-wysihtml5.min.js')) !!}
		<!-- Validate JS -->

		{!! Html::script( asset('theme/js/jquery.validate.js')) !!}
		<!-- Form wizard steps  JS -->
		{!! Html::script( asset('theme/js/jquery.steps.min.js')) !!}
		<!-- jQuery Knob -->
		{!! Html::script( asset('theme/js/jquery.knob.js')) !!}
		<!-- jQuery slim scroll -->
		{!! Html::script( asset('theme/js/jquery.slimscroll.min.js')) !!}
		<!-- Data Tables JS -->
		{!! Html::script( asset('theme/js/jquery.dataTables.min.js')) !!}
		<!-- Pretty Photo JS -->
		{!! Html::script( asset('theme/js/jquery.prettyPhoto.js')) !!}
		<!-- Rate It JS -->
		{!! Html::script( asset('theme/js/jquery.rateit.min.js')) !!}
		<!-- Full calendar -->
		{!! Html::script( asset('theme/js/moment.min.js')) !!}
		{!! Html::script( asset('theme/js/fullcalendar.min.js')) !!}
		<!-- jQuery gritter -->
		{!! Html::script( asset('theme/js/jquery.gritter.min.js')) !!}
		<!-- jQuery gritter notification -->
		{!! Html::script( asset('theme/js/custom.notification.js')) !!}
		<!-- Respond JS for IE8 -->
		{!! Html::script( asset('theme/js/respond.min.js')) !!}
		<!-- HTML5 Support for IE -->
		{!! Html::script( asset('theme/js/html5shiv.js')) !!}
		<!-- Custom JS -->
		{!! Html::script( asset('theme/js/custom.js')) !!}
		
		<!-- Javascript for this page -->
      
        <script type="text/javascript">
		</script>

		@yield('script')
		
	</body>	
</html>