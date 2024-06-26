@extends('layouts.admin')

@section('content')
    @php
        $defaultImage = 'https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg';
    @endphp


    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-5">
            <h1>Lista Progetti</h1>
            <a href="{{ route('admin.projects.create') }}"
                class="px-4 py-2 bg-success text-decoration-none text-white rounded-2">Crea</a>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listaProgetti as $progetto)
                        <tr>
                            <th scope="row">{{ $progetto->id }}</th>
                            <td>{{ $progetto->title }}</td>
                            <td>{{ $progetto->description }}</td>
                            <td>{{ $progetto->type?->title }}</td>
                            <td>{{ $progetto->slug }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.projects.show', ['project' => $progetto->slug]) }}"
                                        class="btn btn-primary">Dettagli</a>
                                    <a href="{{ route('admin.projects.edit', ['project' => $progetto->slug]) }}"
                                        class="btn btn-success
                                        ">Modifica</a>
                                    <form action="{{ route('admin.projects.destroy', ['project' => $progetto->slug]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
