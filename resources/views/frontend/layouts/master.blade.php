<!DOCTYPE html>
<html lang="en">
<head>
	@include('frontend.layouts.head')
</head>
<body class="home-page home-01 ">

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>
	{{-- error success message  --}}
	@include('frontend.layouts.notification')
	<!--header-->
	
	@include('frontend.layouts.header',['topCategories'=>$topCategories])
	
	{{-- content  --}}
	@yield('content')

	{{-- footer  --}}
	@include('frontend.layouts.footer')

	{{-- script  --}}
	@include('frontend.layouts.script')
</body>

</html>