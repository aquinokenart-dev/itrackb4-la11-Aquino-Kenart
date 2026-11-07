@extends('layouts.app')

@section('title', 'Edit Movie')

@section('content')
    <h2>Edit Movie</h2>

    <form action="{{ route('movies.update', $movie) }}" method="POST">
        @csrf
        @method('PUT')

        
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $movie->title) }}"
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select name="genre_id" id="genre_id"
                    class="form-select @error('genre_id') is-invalid @enderror">
                <option value="">Select genre</option>
                @foreach ($genres as $g)
                    <option value="{{ $g->id }}" @selected(old('genre_id') == $g->id)>{{ $g->name }}</option>
                @endforeach
            </select>
            @error('genre_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" name="rating" id="rating"
                   class="form-control @error('rating') is-invalid @enderror"
                   value="{{ old('rating', $movie->rating) }}" step="0.1" min="0" max="10">
            @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" id="year"
                   class="form-control @error('year') is-invalid @enderror"
                   value="{{ old('year', $movie->year) }}" min="1900" max="2030">
            @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Movie</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection