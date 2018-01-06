@extends('admin.layouts.app')

@section('content')
	<form method="POST" action="{{ url('posts') }}" enctype="multipart/form-data" novalidate>
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <div class="form-group">
        	<label>Tytuł</label>
        	<input type="text" name="title" class="form-control" placeholder="Nazwij swoje dzieło!">
        </div>
        <div class="form-group">
        	<label>Treść</label>
        	<textarea class="form-control" name="content" rows="20" placeholder="napisz coś pięknego ;)"></textarea>
        </div>
        <div class="form-group">
        	<label>Okładka</label>
                <input type="file" name="thumbnail" class="form-control">
        </div>
        <div class="form-group">
            <label><input type="checkbox" name="draft" value="1"> Zapisz jako szkic i dopracuj później!</label>
        </div>

	<hr>

        <div class="form-group">
        	<button type="submit" class="btn btn-success form-control">Pokaż to cudo światu!</button>
        </div>
	</form>
@endsection