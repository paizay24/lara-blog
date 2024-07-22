@extends('layouts.app')
@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post Lists</a></li>

        </ol>
    </nav>
    <main>

        <h4>Post Lists</h4>
        <hr>
        <div class="d-flex justify-content-between mb-3">
            <div class="">
                @if (request('keyword'))
                    <span class="mb-0">Search By : " {{ request('keyword') }} "</span>
                    <a href="{{ route('post.index') }}">
                        <i class="bi bi-trash3"></i>
                    </a>
                @endif
            </div>
            <form action="{{ route('post.index') }}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword" required>
                    <button class="btn btn-secondary">
                        <i class="bi bi-search"></i>
                        Search
                    </button>
                </div>
            </form>
        </div>

        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope=" col-10">title</th>
                    <th scope="col">description</th>
                    <th scope="col">Control</th>
                    <th scope="col">Created_at</th>
                </tr>
            </thead>
            @forelse ($posts as $post)
                <tbody>
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td class=" w-25">{{ $post->title }}
                            <div class=" d-flex gap-2 m-2">

                                <p class=" badge text-bg-secondary">
                                    {{ App\Models\Category::find($post->category_id)->title }}</p>
                                @notAuthor
                                <p class=" badge text-bg-primary">{{ App\Models\User::find($post->user_id)->name }}</p>
                                @endnotAuthor
                            </div>
                        </td>
                        <td class=" w-25">{{ Str::words($post->description, 10, '...') }}</td>
                        <td>
                            <div class=" d-flex gap-2">
                                @can('delete', $post)
                                    <form action="{{ route('post.destroy', $post->id) }}" method="POST" class=" inline-block">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash3"></i>
                                        </button>

                                    </form>
                                @endcan

                                @can('update', $post)
                                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                @endcan

                                <a href="{{ route('post.show', $post->id) }}" class=" btn btn-sm btn-outline-primary">
                                    Show More
                                </a>


                            </div>
                        </td>
                        <td>
                            <div>
                                <i class="bi bi-calendar  me-2"></i>
                                {{ $post->created_at->format('d F Y ') }}
                            </div>
                            <div>
                                <i class="bi bi-alarm me-2"></i>
                                {{ $post->created_at->format('h:i A ') }}
                            </div>
                        </td>
                    </tr>
                </tbody>
            @empty
            @endforelse
        </table>
        <div class="">
            {{ $posts->onEachSide(1)->links() }}
        </div>
    </main>
@endsection
