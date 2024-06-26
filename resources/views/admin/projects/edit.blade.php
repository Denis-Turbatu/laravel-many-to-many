@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1 class="my-5">Modifica il tuo progetto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST" class="mb-3">
            {{-- Cookie per far riconoscere il form al server --}}
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label fw-semibold">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') ?? $project->title }}">
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label fw-semibold">Immagine</label>
                <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb"
                    name="thumb" value="{{ old('thumb') ?? $project->thumb }}">
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label fw-semibold">Data di Inizio</label>
                <input type="text" class="form-control @error('start_date') is-invalid @enderror" id="start_date"
                    name="start_date" value="{{ old('start_date') ?? $project->start_date }}">
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label fw-semibold">Data di Fine</label>
                <input type="text" class="form-control @error('end_date') is-invalid @enderror" id="end_date"
                    name="end_date" value="{{ old('end_date') ?? $project->end_date }}">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <select class="form-select" id="type" name="type_id">
                    <option>Seleziona</option>
                    @foreach ($types as $type)
                        <option @selected($project->type?->id == $type->id) value="{{ $type->id }}">{{ $type->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 border border-1 rounded-2 px-2 py-4 col-6">
                <div class="form-check d-flex flex-column">
                    @foreach ($technologies as $tech)
                        <div class="my-2">
                            @if (old('technologies') === null)
                                <input @checked($project->technologies->contains($tech)) class="form-check-input" type="checkbox"
                                    value="{{ $tech->id }}" id="technology-{{ $tech->id }}" name="technologies[]">
                            @else
                                <input @checked(in_array($tech->id, old('technologies', []))) class="form-check-input" type="checkbox"
                                    value="{{ $tech->id }}" id="technology-{{ $tech->id }}" name="technologies[]">
                            @endif

                            <label class="form-check-label" for="technology-{{ $tech->id }}">
                                {{ $tech->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-semibold">Descrizione</label>
                <textarea class="form-control" name="description" rows="6">{{ old('description') ?? $project->description }}</textarea>
            </div>

            <button class="btn btn-success" type="submit">Salva</button>
        </form>

        <a href="{{ route('admin.projects.index') }}" class="text-decoration-none text-white bg-danger p-2 rounded-2">Torna
            alla pagina Iniziale</a>
    </div>
@endsection
