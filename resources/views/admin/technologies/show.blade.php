@extends('layouts.admin')

@section('content')
    <p>{{ $tech->name }}</p>
    <p>{{ $tech->color }}</p>
    
        @foreach ($project->technologies as $item)
        <p class="badge" style="background-color:{{$item->color}}">
            {{$item->name}}
            </p>
        @endforeach
    
    <a href="{{route('admin.projects.index')}}">Torna Indietro</a>
@endsection
