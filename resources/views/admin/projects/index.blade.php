@extends('layouts.app')
@section('content')
<section class="container">
    <h1>Projects</h1>
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{ route('admin.projects.show', $project->slug) }}">{{ $project->title }}</a>
                        </div>
                    </th>
                    <td>
                        <div class="d-flex align-items-center justify-content-center">
                            {{ $project->release_date }}
                        </div></td>
                    <td>
                        <div >
                            <form action="{{route('admin.projects.destroy', $project->slug)}}"class="d-flex align-items-center justify-content-center" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-primary text-decoration-none mx-1"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning text-decoration-none mx-1"><i class="fa-solid fa-pencil"></i></a>
                                <button type="submit" class="btn btn-danger text-decoration-none mx-1 delete-button" data-item="{{ $project->title }}"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary text-decoration-none">Add Project</a>
    </div>
</section>

@endsection