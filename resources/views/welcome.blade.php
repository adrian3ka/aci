@extends('layouts.main_layouts')

@section('css')
    <link href="{{  asset('css/welcome.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
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
