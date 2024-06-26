@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-5">
            <h1>Lista Tecnologie</h1>
            <a href="{{ route('admin.technologies.create') }}"
                class="px-4 py-2 bg-success text-decoration-none text-white rounded-2">Crea</a>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Colore</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($techList as $tech)
                        <tr>
                            <th scope="row">{{ $tech->id }}</th>
                            <td>{{ $tech->name }}</td>
                            <td class="align-middle">
                                {{ $tech->color }}
                                <span class="ms-color-preview align-middle" style="background-color: {{ $tech->color }};"></span>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.technologies.show', ['technology' => $tech->id]) }}"
                                        class="btn btn-primary">Dettagli</a>

                                    <a href="{{ route('admin.technologies.edit', ['technology' => $tech->id]) }}"
                                        class="btn btn-success">Modifica</a>

                                    <form action="{{ route('admin.technologies.destroy', ['technology' => $tech->id]) }}" method="POST">
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
