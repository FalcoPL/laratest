@extends('admin.layouts.app')

@section('content')

@include('admin.category_add')

<table class="table table-striped table-hover">
	@foreach($categories as $category)
	
	<tr>
		<td>{{ $category -> name }}</td>
		<td class="col-md-1"><a href="{{ url('categories/'.$category -> id.'/edit') }}" class="btn btn-info">Edytuj</a><td>
	</tr>

	@endforeach

</table>

@endsection