@extends('layouts.all')

@php
    $title = "Ваши файлы";
    $description = "Поиск файлов по выполненным заказам";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')
    <x-breadcrumbs :title="$title"></x-breadcrumbs>
    <h1>{{$title}}</h1>

    <form class="user_files_form" action="{{route("user-file")}}" method="GET">
        <input type="text" name="login" placeholder="Введите логин" value="{{old('login')}}">
        <button type="submit">Показать файлы</button>
    </form>

    <div class="file_content">
        @if ($search_do)
            @if (!$user_accept)
                <h3>Пользователь не найден</h3>
            @else
                @foreach ($file_list as $key => $items)
                    <h3>{{$key}}</h3>
                    @foreach ($items as $item)
                        <x-file-line :user="$user" :item="$item"></x-file-line>
                    @endforeach
                @endforeach
            @endif

        @endif

    </div>

@endsection

