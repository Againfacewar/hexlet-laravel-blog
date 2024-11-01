@extends('layouts.app')
@section('title', $article->name)

@section('content')
    <p><a href="{{ route('article.index') }}">Назад</a></p>
    <h1>{{ $article->name }}</h1>
    <div>{{ $article->body }}</div>
@endsection