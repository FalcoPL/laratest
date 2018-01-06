@extends('layouts.app')

@section('posts')
    @foreach ($posts as $post)

    	<article>
    	    <h4>{{ $post -> title }}</h4>
    		<div class="row">
    			<div class="col-md-3">
    				<img src="{{ $post -> thumbnail }}" class="img-responsive img-thumbnail">
    			</div>
    			<div class="col-md-9">
    				<p class="text-justify">
    					<small>
    						{{ str_limit($post -> content, 50) }} 
    						<a href="{{ url('posts/'.$post -> id) }}">
    							Zobacz więcej!
    						</a>
    					</small>
    				</p>
    			</div>
    		</div>
    	    <hr>
    	</article>

    @endforeach
    {{ $posts }}
@endsection
