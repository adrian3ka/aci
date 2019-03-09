@extends('layouts.main_layouts')


@section('content')

<table class="table">
	<th>
		<td>Nama</td>
	</th>
	@foreach ($hobbies as $hobby)
		<tr>
			<td>{{ $hobby->id }}</td>
			<td>{{ $hobby->name }}</td>
		</tr>
	@endforeach
</table>
<div>
    <div>
    	{{ $hobbies->links() }}
    </div>

    <a href="{{ url('master_hobbies/create') }}" style="display: inline-block;">
        <button type="button" class="btn btn-primary">Tambah Daftar Hobby</button>
    </a>
</div>
@endsection
