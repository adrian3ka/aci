@extends('layouts.main_layouts')


@section('content')
<table class="table table-striped">
	<th>
		<td>Tanggal</td>
		<td>Trainer</td>
		<td>Location</td>
		<td></td>
	</th>
	@foreach ($schedules as $schedule)
		<tr>
			<td>{{ $schedule->id }}</td>
			<td>{{ $schedule->date }}</td>
			<td>{{ $schedule->trainer }}</td>
			<td>{{ $schedule->location }}</td>
			<td>
			    <a href="{{ url('schedules/' . $schedule->id) }}">
			      <button type="button" class="btn btn-primary">Lihat</button>
			    </a>
			</td>
		</tr>
	@endforeach
</table>
<div>
    <div>
    	{{ $schedules->links() }}
    </div>
    <a href="{{ url('schedules/create') }}" style="display: inline-block;">
        <button type="button" class="btn btn-primary">Tambah Jadwal</button>
    </a>
</div>
@endsection
