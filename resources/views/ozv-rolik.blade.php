@extends('layouts.all')

@php
    $title = "Озвучка видео видеороликов";
    $description = "Озвучка видео видеороликов";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')
    <x-breadcrumbs :title="$title"></x-breadcrumbs>
    <h1>{{$title}}</h1>
    <x-page-banner name="apparat-b.webp"></x-page-banner>
    {!! $options['ozv_rol_text'] !!}
@endsection

