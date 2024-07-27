@extends('master')
@section('content')
    <div class=" container">
        <div class=" row justify-content-center">
            <div class=" col-12 col-lg6">
                <div class="card m-2 p-2 shadow-sm">

                    <div class="card-body" >
                        <h5>{{ $post->title }}</h5>
                        <div class=" m-3">
                            @foreach ($post->photos as $photo)
                                <img src="{{ asset('storage/' . $photo->name) }}" height="100" class="rounded" alt="">
                            @endforeach
                        </div>
                        <p class="m-0">{{ $post->description }}</p>
                        <div class=" mt-2 d-flex justify-content-between align-items-center">
                            <div>
                                <p class=" mb-0">{{ $post->user->name }}</p>
                                <p class=" mb-0"> {{ $post->created_at->diffforHumans() }}</p>
                            </div>
                            <div>
                                <a href="{{ route('page.index') }}">
                                    <button class=" btn btn-primary">See all</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
