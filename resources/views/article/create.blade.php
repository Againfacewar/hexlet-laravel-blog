@extends('layouts.app')
@section('title', 'Создание статьи')

@section('content')
    <h1 class="mb-2">Создание статьи</h1>
    {{ html()->modelForm($article, 'POST', route('article.store'))->open()  }}
        @include('article.form')
        {{ html()->submit('Создать') }}
    {{ html()->closeModelForm() }}
@endsection
