@extends('layouts.all')

@php
    $title = 'Как начать работу с "Эпицентр"';
    $description = "Как начать работу";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

    <h1>{{$title}}</h1>
    <x-page-banner name="apparat-b.webp"></x-page-banner>
    <div class="text_styles">
        {!! $options['work_text'] !!}
    </div>

@endsection

