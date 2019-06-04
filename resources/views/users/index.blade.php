@extends('layouts.main_layouts')


@section('content')
@include('components.user_filter')
<table class="table">
	<th>
		<td>Nama</td>
		<td>Email</td>
		<td>Contribution</td>
		<td>Action</td>
	</th>
	@foreach ($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>Rp. {{ $user->contribution }},-</td>
			<td>
                <a href="{{ url('users/' . $user->id) }}">
                    <button type="button" class="btn btn-primary">Lihat</button>
                </a>
                <form style="display: inline-block;" method="POST" action="{{ url('users/' . $user->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
			</td>
		</tr>
	@endforeach
</table>
<div>
	<h4>Total : {{ $users->total() }}</h4>
</div>
<div>
    <div>
    	{{ $users->links() }}
    </div>
</div>
@endsection
