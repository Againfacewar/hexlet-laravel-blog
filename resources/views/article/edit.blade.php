@extends('layouts.app')
@section('title', 'Редактирование статьи')

@section('content')
    <h1 class="mb-2">Редактирование статьи</h1>
    {{ html()->modelForm($article, 'PATCH', route('article.update', $article))->open() }}
        @include('article.form')
        {{ html()->submit('Обновить')->class('btn btn-primary') }}
    {{ html()->closeModelForm() }}
@endsection
