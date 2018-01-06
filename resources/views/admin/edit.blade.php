@extends('admin.layouts.app')

@section('content')
	<form method="POST" action="{{ url('/posts/' . $post -> id) }}" enctype="multipart/form-data" novalidate>
		{{ csrf_field() }}
        {{ method_field('PATCH') }}
        <h6><a href="{{ url('/posts/' . $post -> id) }}" target="_blank">{{ url('/posts/' . $post -> id) }}</a></h6>
        <div class="form-group">
        	<label>Tytuł</label>
        	<input type="text" name="title" value="{{ $post -> title }}" class="form-control">
        </div>
        <div class="form-group">
        	<label>Treść</label>
        	<textarea class="form-control" name="content" rows="20">{{ $post -> content }}</textarea>
        </div>
        <div class="form-group">
            <label>Kategoria</label>
            <select name="category" id="" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category -> id }}" @if($post -> category == $category -> id) selected @endif>{{ $category -> name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
        	<label>Okładka</label>
        	<div class="row">
        		<div class="col-md-5"><img src="{{ $post -> thumbnail }}" class="img-responsive"></div>
        		<div class="col-md-7"><input type="file" name="thumbnail" class="form-control"></div>
        	</div>
        </div>

		<hr>

        <div class="form-group">
        	<button type="submit" class="btn btn-success form-control">Zapisz zmiany</button>
        </div>
	</form>
@endsection