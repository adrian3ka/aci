@extends('layouts.main_layouts')

@section('css')
    <link href="{{  asset('css/welcome.css') }}" rel="stylesheet" type="text/css">
    <link href="{{  asset('css/slick.css') }}" rel="stylesheet" type="text/css">
    
    <link href="{{  asset('css/slick-theme.css') }}" rel="stylesheet" type="text/css">
    <style>
        .main-banner {
		    border: 2px solid;
		    border-radius: 40px;
            overflow: hidden;
            margin-bottom: 10px;
		}
		.slick-prev:before, .slick-next:before { 
            color:black !important;
        }
		.slick-next {
            height: 100px;
            display: inline;
            right: -40px;
            top: 50%;
            width: 100px;
		}
		.slick-prev {
            height: 100px;
            display: inline;
            left: -40px;
            top: 50%;
            width: 100px;
            z-index: 10;	
		}
    </style>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('js/slick.js') }}" ></script>
    <script>
        $(document).ready(function(){
            $('.main-banner').slick({
                autoplay: true,
                autoplaySpeed: 2000,
                fade: true,
                arrows: true
            });
        });
    </script>
@endsection

@section('content')

<div class="main-banner">
@for ($i = 4; $i <= 5; $i++)
		<img src="{{ url('img/banner/banner_' .$i .'.jpg') }}">
@endfor
</div>
<p class="subtitle">Merasa tertekan, kesepian, menginginkan tantangan dan ingin menjadi 
warga senior yang SEHAT, CERIA dan BAHAGIA? Bergabunglah dengan H2C ACI, 
kita akan merasakan perbedaannya <b>"MUDA DALAM HATI"</b></p>
<div class="row">
	@for ($i = 1; $i <= 4; $i++)
    <div class="col-md-6">
		<div style="border-radius: 10px;">
            <img src="{{ url('img/image' .$i .'.jpg') }}" class="welcome-image">
        </div>
    </div>
    @endfor
</div>
@endsection
