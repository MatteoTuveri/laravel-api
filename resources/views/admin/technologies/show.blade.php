@extends('layouts.app')
@section('content')
    <section class="container my-3" id="item-technology">
        <div class="d-flex justify-content-between align-items-center">
             <h1>{{$technology->name}}</h1>
             <a href="{{route('admin.technologies.edit', $technology->slug)}}" class="btn btn-success px-3">Edit</a>
        </div>
        <div>
            <div class="img-show">
              <img src="{{asset('storage/' . $technology->icon)}}" alt="{{$technology->name}}">  
            </div>
        </div>
    </section>
@endsection
