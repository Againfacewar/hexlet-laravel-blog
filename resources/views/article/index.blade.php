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
        <h1><a href="{{ route('articles.show', $item) }}">{{  $item->name }}</a></h1>
        <h1><a href="{{ route('articles.edit', $item) }}">Редактировать</a></h1>
        <form action="{{ route('articles.destroy', $item) }}" method="POST">
            @csrf
            @method('DELETE')
            <h1><button>Удалить</button></h1>
        </form>
        <div class="">{{ \Str::limit($item->body, 200) }}</div>
    @endforeach
@endsection
