@extends('layouts.main_layouts')

@section('css')
	<!-- Include the default stylesheet -->
	<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/wenzhixin/multiple-select/e14b36de/multiple-select.css">
	<!-- Include plugin -->
	<script src="https://cdn.rawgit.com/wenzhixin/multiple-select/e14b36de/multiple-select.js"></script>
        <link href="{{  asset('css/candidate_users.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function() {
			$(".multiple-select").multipleSelect({
				noneSelectedText: 'Select Something (required)',
				filter: true
			});
			$(".ms-parent.multiple-select").css('width','100%');
			$(document).on('click', '.remove', function(e){
			    var parent = $(this).parent();
			    $(parent).remove();
			});
			$(".add-contact").click(function(){
                $(".contact-form").append(
                '<div class="detail-contact">'+
                    '<div class="remove">Hapus</div>' + 
			        '<input type="text" class="form-control" name="contact_name[]" placeholder="Masukkan Nama Kontak" required>' + 
			        '<br>' + 
			        '<input type="text" class="form-control" name="relation[]" placeholder="Masukkan Relasi">' + 
			        '<br>' + 
			        '<input type="text" class="form-control" name="contact_phone_number[]" placeholder="Masukkan Nomor Kontak" required>' + 
			        '<hr>' +
                '</div>');
			});
		});
	</script>
@endsection

@section('content')
<form method="POST" action=" {{ url('candidate_users') }}">
	@csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Anda" required>
    </div>
    
    <div class="form-group">
        <label for="name">Jenis Kelamin</label>
        <br>
        <input type="radio" name="gender" value="M"> Pria
        <input type="radio" name="gender" value="F"> Wanita
    </div>
    
    <div class="form-group">
        <label for="email">Alamat Email</label>
        <input type="email" class="form-control" name="email" placeholder="Masukkan Alamat Email Anda">
        <small id="emailHelp" class="form-text text-muted">Silakan masukkan alamat email anda untuk beberapa pemberitahuan dari kami.</small>
    </div>
    
    <div class="form-group">
        <label for="identity_number">Nomor Identitas</label>
        <input type="text" class="form-control" name="identity_number" placeholder="Masukkan Nomor Identitas Anda">
    </div>
    
    <div class="form-group">
        <label for="cellphone">Nomor Handphone</label>
        <input type="text" class="form-control" name="cellphone" placeholder="Masukkan Nomor Handphone Anda">
    </div>
    
    <div class="form-group">
        <label for="date_of_birth">Tanggal Lahir</label>
        <input class="form-control" type="date" name="date_of_birth" value="1950-12-31" required>
    </div>
    
    <div class="form-group">
        <label for="date_of_birth">Tempat Lahir</label>
        <input class="form-control" type="text" name="birth_place" >
    </div>
    
    <div class="form-group">
        <label for="identity_number">Alamat Rumah</label>
        <input type="text" class="form-control" name="address" placeholder="Masukkan Alamat Rumah Anda" required>
    </div>
    <div class="form-group">
        <label for="height">Tinggi Badan</label>
        <input type="number" class="form-control" name="height" placeholder="Masukkan Tinggi Badan Anda" required>
    </div>
    <div class="form-group">
        <label for="weight">Berat Badan</label>
        <input type="number" class="form-control" name="weight" placeholder="Masukkan Berat Badan Anda" required>
        <small id="weightHelp" class="form-text text-muted">Dalam kilogram.</small>
    </div>
    <div class="form-group">
        <label for="weight">Golongan Darah</label>
        <input type="text" class="form-control" name="blood_type" placeholder="Masukkan Golongan Darah Anda" required>
    </div>
    <div class="form-group">
        <label for="weight">Hobi</label>
        <br>
        <select class="multiple-select" style="width: 95%" name="hobby_ids[]" multiple="multiple">
            @for ($i = 0; $i < $hobbies->count() ; $i++)
                <option value="{{ $hobbies[$i]->id }}" >{{ $hobbies[$i]->name }} </option> 
            @endfor
        </select>
    </div>
    <hr>
    <div class="form-group contact-form">
        <label for="weight">Kontak yang dapat dihubungi dalam keadaan darurat</label>
        <div class="detail-contact">
			<input type="text" class="form-control" name="contact_name[]" placeholder="Masukkan Nama Kontak" required>
			<br>
			<input type="text" class="form-control" name="relation[]" placeholder="Masukkan Relasi">
			<br>
			<input type="text" class="form-control" name="contact_phone_number[]" placeholder="Masukkan Nomor Kontak" required>
			<hr>
        </div>
    </div>
    <button type="button" class="btn btn-success add-contact">Tambah Kontak</button>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
