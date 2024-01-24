@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>technology Edit</h1>
        <form action="{{ route('admin.technologies.update',$technology->slug) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
     <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                required minlength="3" maxlength="200" value="{{ old('name',$technology->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
    </div>
    <div class="mb-3">
        <label for="documentation">Documentation</label>
        <input type="url" class="form-control @error('documentation') is-invalid @enderror" name="documentation" id="documentation" value="{{ old('name',$technology->documentation) }}">
        @error('documentation')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="d-flex">
        <div class="me-3">
            <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
        </div>
        <div class="mb-3">
                <label for="icon">icon</label>
                <input type="file" class="form-control @error('icon') is-invalid @enderror" name="icon" id="icon" value="{{old('icon',$technology->icon)}}">
                @error('icon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        </div>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-success">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </div>

        </form>
    </section>
@endsection
