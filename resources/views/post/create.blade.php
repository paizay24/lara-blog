@extends('layouts.app')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category Lists</a></li>
      <li class="breadcrumb-item active" aria-current="page">Create Category</li>
    </ol>
  </nav>
  <main>
    <h1>Create Category</h1>
  </main>
@endsection
