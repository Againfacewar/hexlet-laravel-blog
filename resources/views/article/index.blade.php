@extends('layouts.app')
@section('title', 'Статьи')

@section('content')
    <h1>Список статей</h1>
    @isset($flash)
        <div class="alert alert-success">
            {{ $flash }}
        </div>
    @endisset
    @foreach($articles as $item)
        <h1><a href="{{ route('article.show', ['id' => $item->id]) }}">{{  $item->name }}</a></h1>
        <div class="">{{ \Str::limit($item->body, 200) }}</div>
    @endforeach
@endsection
