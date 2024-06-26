@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1 class="my-5">Aggiungi una tecnologia!</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.technologies.update', ['technology' => $technology->id]) }}" method="POST" class="mb-3">
            {{-- Cookie per far riconoscere il form al server --}}
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="color" class="form-label fw-semibold">Colore</label>
                <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color"
                    value="{{ old('title') }}">
            </div>

            <button class="btn btn-success" type="submit">Salva</button>
        </form>

        <a href="{{ route('admin.technologies.index') }}" class="text-decoration-none text-white bg-danger p-2 rounded-2">Torna
            alla pagina Iniziale</a>
    </div>
@endsection
