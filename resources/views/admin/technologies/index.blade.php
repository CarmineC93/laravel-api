@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="mt-3 text-center">La lista delle tecnologie di progetto</h2>
        <div class="row justify-content-between">
            <div class="col-5">
                <form action="{{ route('admin.technologies.store') }}" method="POST" class="mt-3">
                    @csrf
                    <div class="input-group">
                        <input name="name" type="text" class="form-control"
                            placeholder="Inserisci una nuova tecnologia di progetto"
                            aria-label="Inserisci una nuova tecnologia di progetto" aria-describedby="create-type-btn">
                        <button class="btn btn-outline-primary" type="submit" id="create-type-btn">Salva</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Tipo</th>
                            <th scope="col">Numero dei progetti</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($technologies as $technology)
                            <tr>

                                <th scope="row">
                                    <form id="edit-type-{{ $technology->id }}"
                                        action="{{ route('admin.technologies.update', $technology->slug) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="name" id="name" class="form-control border-0"
                                            value="{{ $technology->name }}">
                                    </form>
                                </th>

                                <td>{{ count($technology->projects) }}</td>
                                <td>
                                    <a href="{{ route('admin.technologies.show', $technology->slug) }}"
                                        class="btn btn-success">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <button form="edit-type-{{ $technology->id }}" class="btn btn-warning" href=""
                                        type="submit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <form action="{{ route('admin.technologies.destroy', $technology->slug) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <p>Nessuna tecnologia presente</p>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
