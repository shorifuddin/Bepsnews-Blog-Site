<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>BEPSNews </title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<!-- Favicon -->
	<link href="{{asset('frontend')}}/img/favicon.png" rel="icon">
	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
	<!-- Libraries Stylesheet -->
	<link href="{{asset('frontend')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<!-- Customized Bootstrap Stylesheet -->
	<link href="{{asset('frontend')}}/css/style.css" rel="stylesheet"> </head>

<body>
	<!-- Topbar Start -->
	<div class="container-fluid d-none d-lg-block">
		<div class="row align-items-center bg-dark px-lg-5">
			<div class="col-lg-9">
				<nav class="navbar navbar-expand-sm bg-dark p-0">
					<ul class="navbar-nav ml-n2">
						<li class="nav-item border-right border-secondary"> <a class="nav-link text-body small" href="#">{{date('M-dD-Y')}}</a> </li>
						<li class="nav-item border-right border-secondary"> <a class="nav-link text-body small" href="#">Advertise</a> </li>
						<li class="nav-item border-right border-secondary"> <a class="nav-link text-body small" href="{{ route('contact') }}">Contact</a> </li>
					</ul>
				</nav>
			</div>
			<div class="col-lg-3 text-right d-none d-md-block">
				<nav class="navbar navbar-expand-sm bg-dark p-0">
					<ul class="navbar-nav ml-auto mr-n2">
						<li class="nav-item"> <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a> </li>
						<li class="nav-item"> <a class="nav-link text-body" href="#"><small class="fab fa-facebook-f"></small></a> </li>
						<li class="nav-item"> <a class="nav-link text-body" href="#"><small class="fab fa-linkedin-in"></small></a> </li>
						<li class="nav-item"> <a class="nav-link text-body" href="#"><small class="fab fa-instagram"></small></a> </li>
						<li class="nav-item"> <a class="nav-link text-body" href="#"><small class="fab fa-google-plus-g"></small></a> </li>
						<li class="nav-item"> <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a> </li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="row align-items-center bg-white py-3 px-lg-5">
			<div class="col-lg-4">
				<a href="{{ route('/') }}" class="navbar-brand p-0 d-none d-lg-block">
					<h1 class="m-0 display-4 text-uppercase text-primary">BEPS<span class="text-secondary font-weight-normal">News</span></h1> </a>
			</div>
		</div>
	</div>
	<!-- Topbar End -->
	<!-- Navbar Start -->
	<div class="container-fluid p-0">
		<nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
			<a href="{{ route('/') }}" class="navbar-brand d-block d-lg-none">
				<h1 class="m-0 display-4 text-uppercase text-primary">BEPS
                    <span class="text-white font-weight-normal">News</span>
                </h1>
            </a>
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">     <span class="navbar-toggler-icon"></span>
            </button>
			<div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
				<div class="navbar-nav mr-auto py-0">

                    <a href="{{ route('/') }}" class="nav-item nav-link {{ '/' == request()->path() ? 'active' : '' }}">হোম</a>
                @php
                    $categoies = App\Models\Category::where('category_status', 1)->limit(8)->get();
                @endphp
                @foreach ( $categoies as $category)
                    <a href="{{ route('category',$category->category_id) }}" class="nav-item nav-link {{ 'category/{id}' == request()->path() ? 'active' : '' }}">{{ $category->category_name }}</a>
                @endforeach

                </div>

                <form action="{{ route('search') }}">
				<div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
					<input type="search" name="search" class="form-control border-0" placeholder="Search News">
					<div class="input-group-append">
						<button class="input-group-text bg-primary text-dark border-0 px-3"><i class="fa fa-search"></i></button>
					</div>
				</div>
                </form>

			</div>
		</nav>
	</div>
	<!-- Navbar End -->
    @yield('content')
	<!-- Footer Start -->
    @include('frontend.home.footer')
	<!-- Footer End -->
	<!-- Back to Top --><a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>
	<!-- JavaScript Libraries -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
	<script src="{{asset('frontend')}}/lib/easing/easing.min.js"></script>
	<script src="{{asset('frontend')}}/lib/owlcarousel/owl.carousel.min.js"></script>
	<!-- Template Javascript -->
	<script src="{{asset('frontend')}}/js/main.js"></script>
</body>

</html>
