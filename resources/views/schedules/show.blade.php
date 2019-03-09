@extends('layouts.main_layouts')


@section('content')
<table class="table table-striped">
    <tbody>
        <tr>
            <th>Id</th>
            <td>{{ $schedule->id }}</td>
        </tr>
        <tr>
            <th>Tanngal</th>
            <td>{{ $schedule->date }}</td>
        </tr>
        <tr>
            <th>Lokasi</th>
            <td>{{ $schedule->location }}</td>
        </tr>
        <tr>
            <th>Trainer</th>
            <td>{{ $schedule->trainer }}</td>
        </tr>
    </tbody>
</table>

<h3>Detil Kegiatan</h3>
<table class="table">
	<th>
	    <td>Nama Kegiatan</td>
	    <td>Waktu Mulai</td>
	</th>
    <tbody>
    @foreach($schedule->details as $detail)
        <tr>
			<td>{{ $detail->id }}</td>
            <td>{{ $detail->name }}</td>
            <td>{{ $detail->time }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@if(Auth::user()->email == 'lidia@gmail.com')
<form style="display: inline-block;" method="POST" action="{{ url('schedule/' . $schedule->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Batalkan</button>
</form>
@endif
@endsection
