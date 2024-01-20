
@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-uppercase">{{ $category->name }}</h1>
        <div class="d-flex flex-column align-items-center">
            <table class="table table-hover">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($technology->projects as $project)
                        <tr>
                            <th>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('admin.technologies.show', $project->slug) }}">{{ $project->name }}</a>
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
                                        <a href="{{ route('admin.projectss.show', $project->slug) }}" class="btn btn-primary text-decoration-none mx-1"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('admin.projectss.edit', $project->slug) }}" class="btn btn-warning text-decoration-none mx-1"><i class="fa-solid fa-pencil"></i></a>
                                        <button type="submit" class="btn btn-danger text-decoration-none mx-1 delete-button" data-item="{{ $project->name }}"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <div>No Projects</div>
                    @endforelse
                </tbody>
            </table>

            <a href="{{route('admin.technologies.index')}}" class="btn btn-primary">Return to the Dashboard</a>
        </div>
    </div>
@endsection