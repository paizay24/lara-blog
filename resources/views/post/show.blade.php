@extends('layouts.app')
@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="">Post Detail</a></li>

        </ol>
    </nav>
    <main>
        <h4>Post Detail</h4>
        <div class=" card p-3">
            <div class=" card-title">
                <h5 class=" text-bold">{{ $post->title }}</h5>
                <div class=" d-flex gap-3 ">
                    <div class="badge text-bg-secondary">{{ $post->user->name }}</div>
                    <div class="badge text-bg-secondary">{{ $post->category->title }}</div>
                    <div class="badge text-bg-secondary">{{ $post->created_at->format('d F Y ') }}</div>
                    <div class="badge text-bg-secondary"> {{  $post->created_at->format('h:i A ')}} </div>

                </div>
            </div>
            <hr>
            <div class=" card-body p-0">
                <p class=" ">{{ $post->description }}</p>
            </div>
            <div>
                @isset($post->featured_image)
                    <img src="{{ asset('storage/' . $post->featured_image) }}" class="w-100  mb-3" alt="">
                @endisset
            </div>

        </div>

    </main>
@endsection
