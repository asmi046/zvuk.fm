@extends('layouts.all')

@php
    $title = "Расчёт хронометража";
    $description = "Расчёт стоимости и хронометража, по тексту клиента";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')
    <x-breadcrumbs :title="$title"></x-breadcrumbs>
    <h1>{{$title}}</h1>

    <chrono-calc></chrono-calc>

@endsection

