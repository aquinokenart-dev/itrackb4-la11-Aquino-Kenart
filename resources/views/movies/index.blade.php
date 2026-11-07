@extends('layouts.app')

@section('title', 'Movie List')

@section('content')
    <h2>All Movies</h2>

    <div class="mb-3">
        <a href="{{ route('movies.create') }}" class="btn btn-success">Add New Movie</a>
    </div>

    <p>
        Active filters:
        @if (!$genre && !$year)
            None (showing everything)
        @else
            @if ($genre)
                <span class="badge bg-info text-dark">Genre: {{ $genres->firstWhere('id', $genre)?->name }}</span>
            @endif
            @if ($year)
                <span class="badge bg-info text-dark">Year: {{ $year }}</span>
            @endif
        @endif
    </p>

    <div class="mb-2">
        <strong>Genre:</strong>
        @foreach ($genres as $g)
            <a href="{{ route('movies.index', ['genre' => $g->id, 'year' => $year]) }}"
               class="btn btn-sm btn-outline-primary">{{ $g->name }}</a>
        @endforeach
    </div>

    <div class="mb-3">
        <strong>Year:</strong>
        @foreach ([2008, 2010, 2019, 2022] as $y)
            <a href="{{ route('movies.index', ['genre' => $genre, 'year' => $y]) }}"
               class="btn btn-sm btn-outline-primary">{{ $y }}</a>
        @endforeach

        <a href="{{ route('movies.index') }}" class="btn btn-sm btn-secondary ms-3">Clear all filters</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Rating</th>
                <th>Year</th>
                <th>Action</th>


            </tr>
        </thead>
        <tbody>
            @forelse ($movies as $movie)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('movies.show', $movie->id) }}">{{ $movie->title }}</a></td>
                    <td>{{ $movie->genre->name }}</td>
                    <td>{{ $movie->rating }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>
                         <a href="{{ route('movies.edit', $movie) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('movies.destroy', $movie) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Delete this record?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No movies found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <p>Queries: {{ count(\Illuminate\Support\Facades\DB::getQueryLog()) }}</p>
@endsection