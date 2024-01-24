@extends('layouts.app')
@section('content')
<section class="container">
    <h1>categories</h1>
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">Name</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{ route('admin.categories.show', $category->slug) }}">{{ $category->name }}</a>
                        </div>
                    </th>
                    <td>
                        <div >
                            <form action="{{route('admin.categories.destroy', $category->slug)}}"class="d-flex align-items-center justify-content-center" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('admin.categories.show', $category->slug) }}" class="btn btn-primary text-decoration-none mx-1"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('admin.categories.edit', $category->slug) }}" class="btn btn-warning text-decoration-none mx-1"><i class="fa-solid fa-pencil"></i></a>
                                <button type="submit" class="btn btn-danger text-decoration-none mx-1 delete-button" data-item="{{ $category->name }}"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary text-decoration-none">Add category</a>
    </div>
</section>
@include('layouts.partials.modal')
@endsection