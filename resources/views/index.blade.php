@extends('master')
@section('content')
    <div class=" container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-12 ">


                <h1 class=" text-center text-dark">Blog Page</h1>
                <div class="">

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
                    <form action="{{ route('page.index') }}" method="get">
                        <div class="input-group mb-3">
                            <input type="text" name="keyword" required class="form-control" placeholder="Search..." aria-label="Recipient's username"
                                aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </form>
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

        </div>
    @endsection
