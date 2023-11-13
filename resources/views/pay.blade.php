@extends('layouts.all')

@php
    $title = "Прайс на изготовление аудиороликов и аудиорекламы";
    $description = "Описание стоимости изготовления аудиороликов и другой аудиорекламы.";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')
    <x-breadcrumbs :title="$title"></x-breadcrumbs>
    <h1>{{$title}}</h1>

    <h2>Спопобы оплаты</h2>
    <div class="text_styles">
        <img src="{{asset('img/pay2.png')}}" alt="Способы оплаты за изготовление рекламных роликов">
        {!! $options['prices_text'] !!}
    </div>

@endsection

