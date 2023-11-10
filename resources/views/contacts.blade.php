@extends('layouts.all')

@php
    $title = "Контакты";
    $description = "Свяжитесь с нами любым удобным для Вас способом. Студия Эпицентр рекламы.";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

    <h1>{{$title}}</h1>
    <div class="text_styles">
        <h2><a href="tel:+7{{phone_format($options['phone'])}}">{{$options['phone']}}</a></h2>
        <h2><a href="tel:{{phone_format($options['phone2'])}}">{{$options['phone2']}}</a></h2>
        <p class="snoska">Связь по телефону после 13:00</p>
        <p><a href="mailto:{{$options['email']}}">{{$options['email']}}</a></p>
    </div>
@endsection

