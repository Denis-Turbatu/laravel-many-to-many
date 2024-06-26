@extends('layouts.admin')

@section('content')
    <p>Nome: {{ $technology->name }}</p>
    <p>Color: {{ $technology->color }}</p>
    
    <a href="{{route('admin.technologies.index')}}">Torna Indietro</a>
@endsection
