@extends('layouts.main_layouts')


@section('content')
<table class="table">
	<th>
		<td>Nama</td>
		<td>Email</td>
		<td>No KTP</td>
		<td>Action</td>
	</th>
	@foreach ($candidates as $candidate)
		<tr>
			<td>{{ $candidate->id }}</td>
			<td>{{ $candidate->name }}</td>
			<td>{{ $candidate->email }}</td>
			<td>{{ $candidate->identity_number }}</td>
			<td>
			    <a href="{{ url('candidate_users/' . $candidate->id) }}">
			      <button type="button" class="btn btn-primary">Lihat</button>
			    </a>
			</td>
		</tr>
	@endforeach
</table>
<div>
    <div>
    	{{ $candidates->links() }}
    </div>
</div>
@endsection
