@extends('layouts.all')

@php
    $title = "Оформление эфира";
    $description = "Оформление эфира";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')
    <x-breadcrumbs :title="$title"></x-breadcrumbs>
    <h1>{{$title}}</h1>
    <x-page-banner name="apparat-b.webp"></x-page-banner>
    {!! $options['efir_text'] !!}
@endsection

