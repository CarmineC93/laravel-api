
@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center mt-3">{{ $project->title }}</h1>
        <div class="d-flex justify-content-between mt-3">
            <p>{{ $project->slug }}</p>
        </div>

        <div class="technologies">
            @forelse ($project->technologies as $technology)
                <span style="color: blue">#{{ $technology->name }}</span>
            @empty
                <span>Nessuna tecnologia</span>
            @endforelse
        </div>

        <p class="mt-3">{{ $project->description }}</p>
        {{-- mettere o null safe operator o terziario che controlli che ci sia il tipo per quel progetto --}}
        <p style="color: red"> {{ $project->type?->name }}</p>

        <div class="text-center">
            @if ($project->cover_image)
                <img src="{{ asset('storage/' . $project->cover_image) }}" alt="project cover" style="max-width:300px">
            @else
                <div class="w-50 bg-secondary py-4 text-center">
                    Nessun immagine
                </div>
            @endif
        </div>
    </div>
@endsection
