@extends('layouts.admin')

@section('content')
    <p>{{ $project->title }}</p>
    <p>{{ $project->description }}</p>
    <p>{{ $project->type?->title }}</p>
    <p>{{ $project->slug }}</p>
    <a href="{{route('admin.projects.index')}}">Torna Indietro</a>
@endsection
