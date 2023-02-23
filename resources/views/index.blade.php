@extends('layouts.master')

@section('content')
    <div class="container mt-4">
       <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
          <h1 class="display-5 fw-bold">Nexterns Blog</h1>
          <p class="col-md-8 fs-4">A Practical Development exercise with Nexterns, creating a BLOG with Laravel 10.</p>
          <a class="btn btn-primary btn-lg" href="{{ route('dashboard')}}">Go to Dashboard</a>
        </div>
         </div>
    </div>

    <div class="container my-5">
        <div class="row">
            @forelse ($blogs as $blog)
                <div class="col-md-6 col-lg-4 ">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset( $blog->image) }}" alt="{{ $blog->title }}">
                        <div class="card-body">
                            <h4 class="card-title">{{ $blog->title }}</h4>
                            <p class="card-text">{{ Str::limit(strip_tags($blog->description), 150, '...') }}</p>
                            <div class="text-end">
                                <a href="{{ route('blog.show', $blog->id)}}" class="btn btn-outline-primary">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-primary" role="alert">
                    <div class="d-block text-center">
                        <i class="fas fa-box-open fa-5x"></i>
                        <h5>
                            <strong>So Sorry!</strong> No articles Available
                        </h5>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

@endsection
