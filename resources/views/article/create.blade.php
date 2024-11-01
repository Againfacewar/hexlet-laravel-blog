@extends('layouts.app')
@section('title', 'Создание статьи')

@section('content')
    <h1 class="mb-2">Создание статьи</h1>
    @if ($errors->any())
        <div class="mb-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{ html()->modelForm($article, 'POST', route('article.store'))->open()  }}
        {{  html()->label('Имя', 'name') }}
        {{  html()->input('text', 'name') }}
        {{  html()->label('Содержание', 'body') }}
        {{  html()->textarea('body') }}
        {{ html()->submit('Создать') }}
    {{ html()->closeModelForm() }}
@endsection
