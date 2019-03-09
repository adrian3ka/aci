@extends('layouts.main_layouts')


@section('content')
@if($errors->any())
    <h4 id="alert">{{$errors->first()}}</h4>
@endif
<form method="POST" action=" {{ url('master_hobbies') }}">
	@csrf
    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" class="form-control" name="name" placeholder="Masukkan Hobby" required>
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection
