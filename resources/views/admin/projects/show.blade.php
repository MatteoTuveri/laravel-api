@extends('layouts.app')
@section('content')
<section class="container my-3" id="item-project">
    <div class="d-flex justify-content-between align-items-center">
         <h1>{{$project->title}}</h1>
         <a href="{{route('admin.projects.edit', $project->slug)}}" class="btn btn-success px-3">Edit</a>
    </div>
    <div>
        <p>{!! $project->description !!}</p>
        @if($project->category_id)
            <div class="mb-3">
                <h4>Category</h4>
                <a class="badge text-bg-primary" href="{{route('admin.categories.show', $project->category->slug)}}">{{$project->category->name}}</a>
            </div>
        @endif
        <img src="{{asset('storage/' . $project->image)}}" alt="{{$project->title}}">
         @if(count($project->technologies) > 0)
            <div class="mb-3">
                <h4>technologies</h4>
                @foreach ($project->technologies as $technology)
                    <a class="badge rounded-pill text-bg-success" href="{{route('admin.technologies.show', $technology->slug)}}">{{$technology->name}}</a>
                @endforeach

            </div>
        @endif
    </div>
</section>
@endsection