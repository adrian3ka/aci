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
<form method="POST" action=" {{ url('users/' . $user->id) }}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Anda" value="{{ $user->name }}" required>
    </div>
    
    <div class="form-group">
        <label for="name">Kontribusi</label>
        <input type="text" class="form-control" name="contribution" placeholder="Masukkan Kontribusi Peserta" value="{{ $user->contribution }}" required>
    </div>
    
    <div class="form-group">
        <label for="email">Alamat Email</label>
        <input type="email" class="form-control" name="email" placeholder="Masukkan Alamat Email Anda" value="{{ $user->email }}">
        <small id="emailHelp" class="form-text text-muted">Silakan masukkan alamat email anda untuk beberapa pemberitahuan dari kami.</small>
    </div>
    
    <div class="form-group">
        <label for="cellphone">Nomor Handphone</label>
        <input type="text" class="form-control" name="cellphone" placeholder="Masukkan Nomor Handphone Anda" value="{{ $user->cellphone }}">
        <small id="emailHelp" class="form-text text-muted">Silakan masukkan alamat email anda untuk beberapa pemberitahuan dari kami.</small>
    </div>
    
    <div class="form-group">
        <label for="identity_number">Nomor Identitas</label>
        <input type="text" class="form-control" name="identity_number" placeholder="Masukkan Nomor Identitas Anda" value="{{ $user->identity_number }}">
    </div>
    
    <div class="form-group">
        <label for="date_of_birth">Tempat Lahir</label>
        <input class="form-control" type="text" name="birth_place" value="{{ $user->birth_place }}" required>
    </div>
    
    <div class="form-group">
        <label for="date_of_birth">Tanggal Lahir</label>
        <input class="form-control" type="date" name="date_of_birth" value="{{ $user->date_of_birth }}" required>
    </div>
    <div class="form-group">
        <label for="identity_number">Alamat Rumah</label>
        <input type="text" class="form-control" name="address" value="{{ $user->address }}" placeholder="Masukkan Alamat Rumah Anda" required>
    </div>
    <div class="form-group">
        <label for="height">Tinggi Badan</label>
        <input type="number" class="form-control" name="height" value="{{ $user->height }}" placeholder="Masukkan Tinggi Badan Anda" required>
    </div>
    <div class="form-group">
        <label for="weight">Berat Badan</label>
        <input type="number" class="form-control" name="weight" placeholder="Masukkan Berat Badan Anda" value="{{ $user->weight }}" required>
        <small id="weightHelp" class="form-text text-muted">Dalam kilogram.</small>
    </div>
    
    <div class="form-group">
        <label for="weight">Golongan Darah</label>
        <input type="text" class="form-control" name="blood_type" placeholder="Masukkan Golongan Darah Anda" value="{{ $user->blood_type }}" required>
    </div>
    
    <div class="form-group">
        <label for="weight">Hobi</label>
        <br>
        <select class="multiple-select" style="width: 95%" name="hobby_ids[]" multiple="multiple">
            @for ($i = 0; $i < $hobbies->count() ; $i++)
                <option value="{{ $hobbies[$i]->id }}" {{ (in_array($hobbies[$i]->name, $user->hobbies()->pluck('name')->toArray()) ? 'selected' : '' )}}>{{ $hobbies[$i]->name }} </option> 
            @endfor
        </select>
    </div>
    <hr>
    <div class="form-group contact-form">
        <label for="weight">Kontak yang dapat dihubungi dalam keadaan darurat</label>
        @php $contact_count = 0 @endphp
        @foreach ($user->contacts as $contact)
            @php $contact_count++ @endphp
            <div class="detail-contact">
				@if($contact_count != 1)
                     <div class="remove">Hapus</div>
                @endif
			    <input type="text" class="form-control" name="contact_name[]" placeholder="Masukkan Nama Kontak" value="{{ $contact->name }}" required>
		    	<br>
			    <input type="text" class="form-control" name="relation[]" placeholder="Masukkan Relasi" value="{{ $contact->relation }}" required>
		    	<br>
		    	<input type="text" class="form-control" name="contact_phone_number[]" placeholder="Masukkan Nomor Kontak"  value="{{ $contact->phone_number }}" required>
		    	<hr>
            </div>
        @endforeach
    </div>
    <button type="button" class="btn btn-success add-contact">Tambah Kontak</button>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
