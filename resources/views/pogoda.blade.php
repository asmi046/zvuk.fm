@extends('layouts.all')

@php
    $title = "Радио прогноз погоды";
    $description = "Прогноз погоды радио ТВ или торгового центра";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

    <h1>{{$title}}</h1>

    <x-page-banner name="meteo.webp"></x-page-banner>
    {!! $options['meteo_text'] !!}

    <h2>Примеры "Прогноза погоды":</h2>

    <div class="rolik_line">
        <div class="name"><span>Женским голосом</span></div>
        <div class="rolik"><audio src="{{asset('pogoda/prognoz.mp3')}}" controls></audio></div>
        <div class="price"><span>от 4000 ₽/мес.</span></div>
    </div>

    <div class="rolik_line">
        <div class="name"><span>Мужским голосом</span></div>
        <div class="rolik"><audio src="{{asset('pogoda/prognoz2.mp3')}}" controls></audio></div>
        <div class="price"><span>от 4000 ₽/мес.</span></div>
    </div>
@endsection

