@extends('layouts.app')
@section('content')
    <section class="container my-3" id="item-category">
        <div class="d-flex justify-content-between align-items-center">
             <h1>{{$category->name}}</h1>
             <a href="{{route('admin.categories.edit', $category->slug)}}" class="btn btn-success px-3">Edit</a>
        </div>
    </section>
@endsection
