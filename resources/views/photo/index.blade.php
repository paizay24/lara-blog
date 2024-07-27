@extends('layouts.app')
@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post Lists</a></li>
            <li class="breadcrumb-item"><a href="">User Photos</a></li>

        </ol>
    </nav>
    <main>
        <h4>Photo Page</h4>
        @foreach (Auth::user()->photos as $photo )
        <img src="{{ asset('storage/'.$photo->name) }}" height="100" class="rounded" alt="">

        @endforeach

    </main>
@endsection
