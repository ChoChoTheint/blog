@extends('layout')

@section('title')
<title>All Blogs</title>
@endsection


@section('content')
@foreach($blogs as $blog)
        <h1>
            <a href="blogs/{{ $blog->id }}">{{ $blog->title }}</a> 
            {{ $blog->created_at->diffForHumans() }}
        </h1>
        
        <div>
            <p>{{ $blog->body }}</p>
            <p>Category - {{$blog->category->name}} </p>
        </div>
@endforeach
@endsection