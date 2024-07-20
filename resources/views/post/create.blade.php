@extends('layouts.app')
@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post Lists</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Post</li>
        </ol>
    </nav>
    <main>
        <main>
            <div class=" card">
                <div class=" card-body">
                    <h4>Create Post</h4>

                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                placeholder="Enter Post Title"
                                class="form-control form-control-sm @error('title') is-invalid @enderror">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Post Description</label>
                            <textarea name="description" class=" form-control @error('description') is-invalid @enderror" id="" cols="30" rows="5">
                            {{ old('description') }}
                        </textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">

                            <label for="" class="form-label">Select Category</label>
                            <select name="category" class="form-select  @error('category') is-invalid @enderror"
                                aria-label="Default select example">
                                @foreach (\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == old('category') ? 'selected' : '' }}>{{ $category->title }}
                                    </option>
                                @endforeach

                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">

                            <label for="" class="form-label">Choose Featured Image</label>
                            <input type="file" name="featured_image"
                                class=" form-control @error('featured_image') is-invalid

                            @enderror">
                            @error('featured_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </main>
    </main>
@endsection
