@extends('layout')

@section('title')
<title>All Blogs</title>
@endsection


@section('content')
@foreach($blogs as $blog)
        <h1>
            <a href="blogs/{{ $blog->slug }}">{{ $blog->title }}</a> 
            {{ $blog->date }}
        </h1>
        
        <div>
            <p>{{ $blog->body }}</p>
        </div>
@endforeach
@endsection