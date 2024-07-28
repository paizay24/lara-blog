@extends('master')
@section('content')
    <div class=" container">
        <div class=" row justify-content-center">
            <div class=" col-12 col-lg6">
                <div class="card m-2 p-2 shadow-sm">

                    <div class="card-body" >
                        <h5>{{ $post->title }}</h5>
                        <div class=" m-3">

                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($post->photos as $key=>$photo )
                                        <div class="carousel-item {{ $key===0 ? 'active' : '' ;}}">
                                            <img src="{{ asset('storage/' . $photo->name) }}" class="d-block w-100 post-img" alt="...">
                                          </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                  </div>

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
