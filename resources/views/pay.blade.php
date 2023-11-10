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

@endsection

