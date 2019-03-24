@extends('layouts.main_layouts')


@section('content')

<table class="table">
	<th>
		<td>Nama</td>
		<td></td>
	</th>
	@foreach ($hobbies as $hobby)
		<tr>
			<td>{{ $hobby->id }}</td>
			<td>{{ $hobby->name }}</td>
			<td>
                <form style="display: inline-block;" method="POST" action="{{ url('master_hobbies/' . $hobby->id) }}">
                    @csrf
                    @method('DELETE')
                   <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
			</td>
			</td>
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
