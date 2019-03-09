@extends('layouts.main_layouts')

@section('script')
	<script type="text/javascript">
		$(document).on('click', '.remove', function(e){
		    var parent = $(this).parent();
		    $(parent).remove();
		});
		$(document).ready(function() {
			$(".add-detail").click(function(){
                $(".detail-form").append(
                '<div class="detail-schedule">' +
                    '<label for="detail_name">Nama</label>' + 
                    '<div class="remove">Hapus</div>' +
                    '<input type="text" class="form-control" name="detail_name[]" required>' +
                    '<label for="detail_time">Waktu</label>' + 
                    '<input type="time" class="form-control" name="detail_time[]" required>' +
                    '<hr>' +
                '</div>');
			});
		});
	</script>
@endsection
@section('content')
<form method="POST" action=" {{ url('schedules') }}">
	@csrf
    <div class="form-group">
        <label for="date">Tanngal</label>
        <input type="date" class="form-control" name="date" required>
    </div>
    <div class="form-group">
        <label for="trainer">Trainer</label>
        <input type="text" class="form-control" name="trainer" placeholder="Masukkan Trainer" required>
    </div>
    <div class="form-group">
        <label for="location">Lokasi</label>
        <input type="text" class="form-control" name="location" placeholder="Masukkan Lokasi" required>
    </div>
    <hr>
    <h3>Detil Kegiatan</h3>
    <div class="form-group detail-form">
        <div class="detail-schedule">
            <label for="detail_name">Nama</label>
            <input type="text" class="form-control" name="detail_name[]" required>
            <label for="detail_time">Waktu</label>
            <input type="time" class="form-control" name="detail_time[]" required>
            <hr>
        </div>
    </div>
    <button type="button" class="btn btn-warning add-detail">Tambah Detail Acara</button>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
