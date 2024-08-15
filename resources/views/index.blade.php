@extends('templates.master')
@section('content')
    <div class=" container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12 ">
                <div class=" mt-3">

                    @isset($category)
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p>Filter By : {{ $category->title }}</p>
                            <a href="{{ route('page.index') }}" class="btn  btn-outline-primary">See All</a>
                        </div>
                    @endisset
                </div>
                <div class=" d-flex justify-content-between mb-3">
                   <div>
                    @if(request('keyword'))
                    <span class=" mb-0">
                        Serarch By : "{{ request('keyword') }}"
                    </span>
                    <a href="{{ route('page.index') }}">
                        <i class=" bi bi-trash3"></i>
                    </a>
                @endif
                   </div>

                </div>

                @forelse ($posts as $post)
                    <div class="card m-2 p-2 shadow-sm">

                        <div class="card-body">
                            <h5>{{ $post->title }}</h5>
                            <div class="">
                                <a href="{{ route('page.category',$post->category->slug) }}">
                                    <span class="badge bg-secondary">
                                        {{ $post->category->title }}
                                    </span>
                                </a>
                            </div>
                            <p class="m-0">{{ $post->excerpt }}</p>
                            <div class=" mt-2 d-flex justify-content-between align-items-center">
                                <div>
                                   <a href="{{ route('page.user',$post->user->id) }}">
                                    <span class="badge bg-primary">
                                        {{ $post->user->name }}
                                    </span>
                                   </a>
                                    <p class=" mb-0"> {{ $post->created_at->diffforHumans() }}</p>
                                </div>
                                <div>
                                    <a href="{{ route('page.detail',$post->slug) }}">
                                        <button class=" btn btn-primary">See more</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h5>There is no post.</h5>
                @endforelse
                <div class=" m-2">
                    {{ $posts->onEachSide(1)->links() }}
                </div>

            </div>
            <div class=" col-lg-4 col-12">
                @include('templates.sidebar')
            </div>

        </div>
    @endsection
