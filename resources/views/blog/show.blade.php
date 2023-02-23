@extends('layouts.master')

@section('content')
    <div class="container my-5">
        <h3>{{ $blog->title }}</h3>
        <img src="{{ asset($blog->image)}}" style="width:100%; height: auto">
        <ul class="d-flex" style="list-style: none">
            <li><small><i class="fas fa-user-circle"></i> <strong>{{ $blog->user->name }}</strong></small></li> |
            <li><small><i class="fas fa-calendar-times"></i> <strong>{{ $blog->created_at->diffForHumans() }}</strong></small></li>
        </ul>

        {{-- <p>{{ $blog->description }}</p> --}}
        <p>{!! $blog->description !!}</p>
    </div>

@endsection
