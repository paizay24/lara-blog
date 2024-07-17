@extends('layouts.app')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category Lists</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
    </ol>
  </nav>
  <main>
    <div class=" card">
        <div class=" card-body">
            <h1>Edit Category</h1>

            <form action="{{ route('category.update',$category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" value="{{ $category->title }}" name="title" id="title" placeholder="Enter Category"
                        class="form-control form-control-sm @error('title') is-invalid @enderror"
                        >
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
  </main>
@endsection
