@extends('layouts.app')
@section('content')
<section class="container">
    <h1>technologies</h1>
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">Name</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
                <tr>
                    <th>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{ route('admin.technologies.show', $technology->slug) }}">{{ $technology->name }}</a>
                        </div>
                    </th>
                    <td>
                        <div >
                            <form action="{{route('admin.technologies.destroy', $technology->slug)}}"class="d-flex align-items-center justify-content-center" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('admin.technologies.show', $technology->slug) }}" class="btn btn-primary text-decoration-none mx-1"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('admin.technologies.edit', $technology->slug) }}" class="btn btn-warning text-decoration-none mx-1"><i class="fa-solid fa-pencil"></i></a>
                                <button type="submit" class="btn btn-danger text-decoration-none mx-1 delete-button" data-item="{{ $technology->name }}"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary text-decoration-none">Add technology</a>
    </div>
</section>
@include('layouts.partials.modal')
@endsection