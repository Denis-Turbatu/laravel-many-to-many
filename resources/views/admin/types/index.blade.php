
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-5">
            <h1>Lista Tipi</h1>
            <a href="{{ route('admin.types.create') }}"
                class="px-4 py-2 bg-success text-decoration-none text-white rounded-2">Crea</a>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Icona</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listaTipi as $type)
                        <tr>
                            <th scope="row">{{$type->id}}</th>
                            <td>{{$type->title}}</td>
                            <td>{{$type->icon}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
