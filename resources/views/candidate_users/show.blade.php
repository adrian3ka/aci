@extends('layouts.main_layouts')


@section('content')
<table class="table table-striped">
    <tbody>
        <tr>
          <th>Id</th>
            <td>{{ $candidate->id }}</td>
        </tr>
        <tr>
          <th>Nama</th>
            <td>{{ $candidate->name }}</td>
        </tr>
        <tr>
          <th>Email</th>
          	<td>{{ $candidate->email }}</td>
        </tr>
        <tr>
          <th>No KTP</th>
          	<td>{{ $candidate->identity_number }}</td>
        </tr>
        <tr>
          <th>Tanggal Lahir</th>
          	<td>{{ $candidate->date_of_birth }}</td>
        </tr>
        <tr>
          <th>Tempat Lahir</th>
          	<td>{{ $candidate->birth_place }}</td>
        </tr>
        <tr>
          <th>Alamat</th>
          	<td>{{ $candidate->address }}</td>
        </tr>
        <tr>
          <th>Tinggi Badan</th>
          	<td>{{ $candidate->height }} cm</td>
        </tr>
        <tr>
          <th>Berat Badan</th>
          	<td>{{ $candidate->weight }} kg</td>
        </tr>
        <tr>
          <th>Golongan Darah</th>
          	<td>{{ $candidate->blood_type }}</td>
        </tr>
        <tr>
          <th>Hobi</th>
          	<td>{{ ($candidate->hobbies == null ? "" : join(', ', $candidate->hobbies->pluck('name')->toArray())) }}</td>
        </tr>
        <tr>
          <th>Contacts</th>
          	<td>{{ ($candidate->contacts == null ? "" : join(', ', $candidate->contacts->pluck('name')->toArray())) }}</td>
        </tr>
    </tbody>
</table>
<a href="{{ url('candidate_users/members/' . $candidate->id) }}">
  <button type="button" class="btn btn-success">Jadikan Member</button>
</a>
<form style="display: inline-block;" method="POST" action="{{ url('candidate_users/' . $candidate->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Tolak</button>
</form>
@endsection
