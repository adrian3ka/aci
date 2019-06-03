@extends('layouts.main_layouts')


@section('content')
<table class="table table-striped">
    <tbody>
        <tr>
          <th>Id</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
          <th>Nama</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
          <th>Email</th>
          	<td>{{ $user->email }}</td>
        </tr>
        <tr>
          <th>No KTP</th>
          	<td>{{ $user->identity_number }}</td>
        </tr>
        <tr>
          <th>Nomor Handphone</th>
          	<td>{{ $user->cellphone }}</td>
        </tr>
        
        <tr>
          <th>Tanggal Lahir</th>
          	<td>{{ $user->date_of_birth }}</td>
        </tr>
        <tr>
          <th>Tempat Lahir</th>
          	<td>{{ $user->birth_place }}</td>
        </tr>
        <tr>
          <th>Alamat</th>
          	<td>{{ $user->address }}</td>
        </tr>
        <tr>
          <th>Tinggi Badan</th>
          	<td>{{ $user->height }} cm</td>
        </tr>
        <tr>
          <th>Berat Badan</th>
          	<td>{{ $user->weight }} kg</td>
        </tr>
        <tr>
          <th>Golongan Darah</th>
          	<td>{{ $user->blood_type }}</td>
        </tr>
        <tr>
          <th>Hobi</th>
          	<td>{{ ($user->hobbies == null ? "" : join(', ', $user->hobbies->pluck('name')->toArray())) }}</td>
        </tr>
        <tr>
          <th>Contacts</th>
          	<td>{{ ($user->contacts == null ? "" : join(', ', $user->contacts->pluck('name')->toArray())) }}</td>
        </tr>
    </tbody>
</table>


<form method="POST" action=" {{ url('users/' . $user->id) }}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="form-group">
        <label for="contribution">Iuran</label>
        <input type="number" class="form-control" name="contribution" placeholder="Masukkan Iuran Anggota" value="{{ $user->contribution }}" required>
        <small id="weightHelp" class="form-text text-muted">Dalam Rupiah</small>
    </div>
    <a class="btn btn-success" href="{{ url('users/' . $user->id . '/edit') }}"" >Edit</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
