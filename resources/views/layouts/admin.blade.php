<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Dashboard | Shorif Uddin</title>
	<!-- App favicon -->
	<link rel="shortcut icon" href="{{asset('backend')}}/assets/images/favicon.ico">
	<!-- Bootstrap Css -->
	<link href="{{asset('backend')}}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    @yield('coustom_css')
	<!-- Icons Css -->
	<link href="{{asset('backend')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="{{asset('backend')}}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend')}}/assets/css/style.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body data-sidebar="dark">
	<!-- <body data-layout="horizontal" data-topbar="dark"> -->
	<!-- Begin page -->
	<div id="layout-wrapper">
		<header id="page-topbar">
			<div class="navbar-header">
				<div class="d-flex">
					<!-- LOGO -->
					<div class="navbar-brand-box">
						<a href="index.html" class="logo logo-dark"> <span class="logo-sm">
                                    <img src="{{asset('backend')}}/assets/images/logo.svg" alt="" height="22">
                                </span> <span class="logo-lg">
                                    <img src="{{asset('backend')}}/assets/images/logo-dark.png" alt="" height="17">
                                </span> </a>
						<a href="index.html" class="logo logo-light"> <span class="logo-sm">
                                    <img src="{{asset('backend')}}/assets/images/logo-light.svg" alt="" height="22">
                                </span> <span class="logo-lg">
                                    <img src="{{asset('backend')}}/assets/images/logo-light.png" alt="" height="19">
                                </span> </a>
					</div>
					<button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn"> <i class="fa fa-fw fa-bars"></i> </button>
					<!-- App Search-->
					<form class="app-search d-none d-lg-block">
						<div class="position-relative">
							<input type="text" class="form-control" placeholder="Search..."> <span class="bx bx-search-alt"></span> </div>
					</form>
				</div>
				<div class="d-flex">
					<div class="dropdown d-inline-block d-lg-none ms-2">
						<button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-magnify"></i> </button>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
							<form class="p-3">
								<div class="form-group m-0">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
										<div class="input-group-append">
											<button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="dropdown d-none d-lg-inline-block ms-1">
						<button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen"> <i class="bx bx-fullscreen"></i> </button>
					</div>
					<div class="dropdown d-inline-block">
						<button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="bx bx-bell bx-tada"></i> <span class="badge bg-danger rounded-pill">3</span> </button>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
							<div class="p-3">
								<div class="row align-items-center">
									<div class="col">
										<h6 class="m-0" key="t-notifications"> Notifications </h6> </div>
									<div class="col-auto"> <a href="#!" class="small" key="t-view-all"> View All</a> </div>
								</div>
							</div>
							<div data-simplebar style="max-height: 230px;">
								<a href="javascript: void(0);" class="text-reset notification-item">
									<div class="d-flex">
										<div class="avatar-xs me-3"> <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="bx bx-cart"></i>
                                                </span> </div>
										<div class="flex-grow-1">
											<h6 class="mb-1" key="t-your-order">Your order is placed</h6>
											<div class="font-size-12 text-muted">
												<p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
												<p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
											</div>
										</div>
									</div>
								</a>
							</div>
							<div class="p-2 border-top d-grid">
								<a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)"> <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span> </a>
							</div>
						</div>
					</div>
					<div class="dropdown d-inline-block">
						<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (!empty(Auth::User()->image))
                            <img class="img-fluid img rounded-circle header-profile-user" src="{{ asset('upload/user/'.Auth::User()->image) }}">
                            @else
                            <img class="img-fluid img rounded-circle header-profile-user" src="{{ asset('upload/avater.jpg') }}">
                            @endif
                             <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ Auth::user()->name }}</span>
                             <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
						<div class="dropdown-menu dropdown-menu-end">
							<!-- item--><a class="dropdown-item d-block" href="#"><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a> <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a> </div>
					</div>
				</div>
			</div>
		</header>
		<!-- ========== Left Sidebar Start ========== -->
		<div class="vertical-menu">
			<div data-simplebar class="h-100">
				<!--- Sidemenu -->
				<div id="sidebar-menu">
					<!-- Left Menu Start -->
					<ul class="metismenu list-unstyled" id="side-menu">
						<li>
							<a href="{{ route('dashboard') }}" class="waves-effect"> <i class="bx bx-home-circle"></i> <span key="t-dashboards">Dashboards</span> </a>
						</li>
                        <li>
							<a href="{{ route('/') }}" class="waves-effect"> <i class="bx bx-world"></i> <span key="t-dashboards">Live Site</span> </a>
						</li>
                        @if(Auth::user()->role=='1' || Auth::user()->role=='2')
						<li class="menu-title" key="t-apps">ADMIN USER'S</li>
                        <li>
							<a href="javascript: void(0);" class="has-arrow waves-effect">
                                 <i class="bx bxs-group"></i> <span key="t-tables">User</span> </a>
							<ul class="sub-menu" aria-expanded="false">
								<li><a href="{{ route('alluser') }}" key="t-basic-tables">ALL User</a></li>
								<li><a href="{{ route('adduser') }}" key="t-data-tables">ADD User</a></li>
							</ul>
						</li>
                        @endif

                        @if(Auth::user()->role=='1' || Auth::user()->role=='2')
						<li class="menu-title" key="t-apps">NEWS UPDATE AREA</li>
                        <li>
							<a href="javascript: void(0);" class="has-arrow waves-effect">
                                 <i class="bx bxs-news"></i> <span key="t-tables">News Area</span> </a>
							<ul class="sub-menu" aria-expanded="false">
								<li><a href="{{ route('news_all') }}" key="t-basic-tables">ALL News</a></li>
								<li><a href="{{ route('news_add') }}" key="t-data-tables">ADD News</a></li>
							</ul>
						</li>
                        @endif

                        @if(Auth::user()->role=='1' || Auth::user()->role=='2')
						<li class="menu-title" key="t-apps">BRAKING NEWS</li>
                        <li>
							<a href="{{ route('brakingnews_show') }}" class="waves-effect"> <i class="bx bx-news"></i> <span key="t-chat">Braking News</span> </a>
						</li>
                        @endif
                        @if(Auth::user()->role=='1' || Auth::user()->role=='2')
						<li class="menu-title" key="t-apps">NEWS CATEGORY</li>
                        <li>
							<a href="javascript: void(0);" class="has-arrow waves-effect">
                                 <i class="bx bx-sitemap"></i> <span key="t-tables">Category</span> </a>
							<ul class="sub-menu" aria-expanded="false">
								<li><a href="{{ route('category_all') }}" key="t-basic-tables">ALL Category</a></li>
								<li><a href="{{ route('category_add') }}" key="t-data-tables">ADD Category</a></li>
							</ul>
						</li>
                        @endif

                        @if(Auth::user()->role=='1' || Auth::user()->role=='2')
						<li class="menu-title" key="t-apps">Manage Website Information</li>
                        <li>
							<a href="javascript: void(0);" class="has-arrow waves-effect">
                                 <i class="bx bx-cog"></i> <span key="t-tables">Website Information</span> </a>
							<ul class="sub-menu" aria-expanded="false">
								<li><a href="{{ route('contact_show') }}" key="t-basic-tables">Contact Info</a></li>
								<li><a href="{{ route('social_show') }}" key="t-data-tables">Social-Media Info</a></li>
							</ul>
						</li>
                        @endif
						<li class="menu-title" key="t-apps">SERVICE</li>
                        @if(Auth::user()->role=='1' || Auth::user()->role=='2')
                        <li>
							<a href="{{ route('recycle') }}" class="waves-effect"> <i class="bx bxs-trash"></i> <span key="t-chat">Recycle Bin</span> </a>
						</li>
                        @endif
						<li>
							<a href="{{ route('logout') }}" class="waves-effect"> <i class="bx bx-power-off"></i> <span key="t-chat">Logout</span> </a>
						</li>
					</ul>
				</div>
				<!-- Sidebar -->
			</div>
		</div>
		<!-- Left Sidebar End -->
		<!-- ============================================================== -->
		<!-- Start right Content here -->
		<!-- ============================================================== -->
		<div class="main-content">
			<div class="page-content">
				<div class="container-fluid">
					<!-- start page title -->
					<div class="row">
						<div class="col-12">
							<div class="page-title-box d-sm-flex align-items-center justify-content-between">
								<h4 class="mb-sm-0 font-size-18">Blog</h4>
								<div class="page-title-right">
									<ol class="breadcrumb m-0">
										<li class="breadcrumb-item"><a href="">Dashboards</a></li>
									</ol>
								</div>
							</div>
						</div>
					</div>
					<!-- end page title -->
                    @yield('content')
					<!-- end row -->
				</div>
				<!-- container-fluid -->
			</div>
			<!-- End Page-content -->
			<footer class="footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<script>
							document.write(new Date().getFullYear())
							</script> © Shorif Uddin. </div>
						<div class="col-sm-6">
							<div class="text-sm-end d-none d-sm-block"> Design & Develop by Shorif Uddin </div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<!-- end main content-->
	</div>
	<!-- END layout-wrapper -->
	<!-- JAVASCRIPT -->
	<script src="{{asset('backend')}}/assets/libs/jquery/jquery.min.js"></script>
	<script src="{{asset('backend')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="{{asset('backend')}}/assets/libs/metismenu/metisMenu.min.js"></script>
	<script src="{{asset('backend')}}/assets/libs/simplebar/simplebar.min.js"></script>
	<script src="{{asset('backend')}}/assets/libs/node-waves/waves.min.js"></script>
	<!-- apexcharts -->
    @yield('coustom_js')
	<script src="{{asset('backend')}}/assets/libs/apexcharts/apexcharts.min.js"></script>
	<!-- dashboard blog init -->
	<script src="{{asset('backend')}}/assets/js/pages/dashboard-blog.init.js"></script>
	<script src="{{asset('backend')}}/assets/js/app.js"></script>
</body>

</html>
