@extends('layouts.admin')

@section('content')
    <p>{{ $project->title }}</p>
    <p>{{ $project->description }}</p>
    <p>{{ $project->type?->title }}</p>
    <p>{{ $project->slug }}</p>
    
        @foreach ($project->technologies as $item)
        <p class="badge fs-6" style="background-color:{{$item->color}}">
            {{$item->name}}
            </p>
        @endforeach
    
    <a href="{{route('admin.projects.index')}}">Torna Indietro</a>
@endsection
