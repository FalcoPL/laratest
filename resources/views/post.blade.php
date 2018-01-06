@extends('layouts.app')

@section('posts')
    @foreach ($posts as $post)

    	<article>
    	    <h4>{{ $post -> title }}</h4>
    		<div class="row">
    			<div class="col-md-12">
    				<img src="{{ $post -> thumbnail }}" class="img-responsive img-thumbnail">
    			</div>
    		</div>
    		<br>
    		<div class="row">
    			<div class="col-md-12">
    				<p class="text-justify">
    					{{ $post -> content }} 
    				</p>
    			</div>
    		</div>
    	    <hr>
    		<a href="{{ url('posts/') }}">
    			← Wróć!
    		</a>
    	</article>

    @endforeach
@endsection
