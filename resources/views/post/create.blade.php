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

        <x-card>
            <x-slot:title>Create Post</x-slot:title>
            <div class=" p-3">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-input name="title" label="Post label"></x-input>

                    <x-input name="featured_image" label="Choose Featured Image" type="file"></x-input>

                    <div class="mb-3">
                        <label for="" class="form-label">Post Description</label>
                        <textarea name="description" class=" form-control @error('description') is-invalid @enderror" id=""
                            cols="30" rows="5">
                            {{ old('description') }}
                        </textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <x-input name="photos" label="Choose Photos" type="file" multipe="true"></x-input>
                   
                    <div class="mb-3">

                        <label for="" class="form-label">Select Category</label>
                        <select name="category" class="form-select  @error('category') is-invalid @enderror"
                            aria-label="Default select example">
                            @foreach (\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}" {{ $category->id == old('category') ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach

                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </x-card>

        </main>
    @endsection
