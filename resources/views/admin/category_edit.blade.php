@extends('admin.layouts.app')

@section('content')

<form method="POST" action="{{ url('categories/'. $category->id) }}">
	{{ csrf_field() }}
    {{ method_field('PATCH') }}
	<div class="form-group">
		<label>Nazwa kategorii</label>
		<input type="text" name="name" class="form-control" value="{{$category->name}}">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-success form-control">Zapisz zmiany</button>
	</div>
</form>
<hr>

@endsection