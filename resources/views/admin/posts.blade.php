@extends('admin.layouts.app')

@section('content')

	<h3>Lista Twoich wpisów</h3>

	{{ $posts }}
	<table class="table table-striped-table table-hover">
		@foreach($posts as $post)
			<tr>
				<td class="col-md-2"><img src="{{ $post -> thumbnail }}" class="img-responsive"></td>
				<td>{{ $post -> title }}</td>
				<td class="col-md-1">
					<a href="{{ url('posts/'.$post -> id.'/edit') }}" class="btn btn-info">Edytuj</a>
				</td>
    				<td class="col-md-1">
    					@if ($post -> draft == 0)
							{{ Form::open(array('route' => array('posts.destroy', $post -> id), 'method' => 'delete')) }}
    							<button type="submit" class="btn btn-danger">Szkic</button>
							{{ Form::close() }}
						@else
							{{ Form::open(array('route' => array('posts.update', $post -> id), 'method' => 'PATCH')) }}
    							<button type="submit" class="btn btn-danger" name="draft" value="1">Przywróć</button>
							{{ Form::close() }}
						@endif
    				</td>
			</tr>
		@endforeach
	</table>
	{{ $posts }}

@endsection