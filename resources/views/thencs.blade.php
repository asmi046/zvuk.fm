@extends('layouts.all')

@php
    $title = "Благодарим за обращение";
    $description = "Благодарим за обращение";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')
    <x-breadcrumbs :title="$title"></x-breadcrumbs>
    <h1>{{$title}}</h1>

    <div class="text_styles">
        <p>Наши специалисты свяжутся с Вами в ближайшее время.</p>
    </div>

@endsection

