@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Post create</h1>
        <form action="{{ route('admin.technologies.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control @error ('name') is-invalid @enderror" placeholder="name" name="name" maxlength="200" minlength="5" required value="{{ old('name') }}">
                @error('name')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">submit</button>
            <button type="reset">reset</button>
            <a href="{{ route('admin.technologies.index') }}">Back to Home</a>
            
        </form>
    </section>
    
@endsection