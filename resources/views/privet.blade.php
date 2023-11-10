@extends('layouts.all')

@php
    $title = "Голосовое приветствие";
    $description = "Голосовое приветствие, запись голосового приветствия";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')
    <x-breadcrumbs :title="$title"></x-breadcrumbs>
    <h1>{{$title}}</h1>
    <x-page-banner name="apparat-b.webp"></x-page-banner>
    {!! $options['privet_text'] !!}
    <h2>Примеры запись голосового приветствия, нашей студии:</h2>

    <div class="rolik_line">
        <div class="name"><span>BeeLine</span></div>
        <div class="rolik"><audio src="{{asset('irv/IVR-beeline.mp3')}}" controls></audio></div>
        <div class="price"><span>от 500 ₽</span></div>
    </div>

    <div class="rolik_line">
        <div class="name"><span>Теле2</span></div>
        <div class="rolik"><audio src="{{asset('irv/IVR-tele2.mp3')}}" controls></audio></div>
        <div class="price"><span>от 500 ₽</span></div>
    </div>

@endsection

