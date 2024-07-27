@extends('layouts.app')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category Lists</a></li>

    </ol>
  </nav>


    <table class="table ">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">title</th>
              @notAuthor
              <th scope="col">Owner</th>
              @endnotAuthor
              <th>Post Count</th>
              <th scope="col">Control</th>
              <th scope="col">Created_at</th>
            </tr>
          </thead>
          @forelse ($categories as $category )
          <tbody>
            <tr>
              <th scope="row">{{ $category->id }}</th>
              <td>{{ $category->title }}</td>
              @notAuthor
              <td>{{ $category->user->name}}</td>
              @endnotAuthor
            <td>{{ $category->posts()->count() }}</td>
              <td><div class=" d-flex gap-2">
                @can('delete',$category)
                <form action="{{ route('category.destroy',$category->id) }}" method="POST" class=" inline-block">
                    @csrf
                    @method('delete')

                    <button class="btn btn-sm btn-outline-danger">
                        <i class="bi bi-trash3"></i>
                    </button>

                </form>
                @endcan

                  @can('update',$category)
                  <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-pencil"></i>
                </a>
                  @endcan


                </div></td>
              <td>
                <div>
                    <i class="bi bi-calendar  me-2"></i>
                    {{ $category->created_at->format('d F Y ') }}
                </div>
                <div>
                    <i class="bi bi-alarm me-2"></i>
                    {{ $category->created_at->format('h:i A ') }}
                </div>
              </td>
            </tr>
          </tbody>
          @empty

          @endforelse
      </table>


@endsection
