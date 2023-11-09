@extends('layouts.all')

@php
    $title = "Радио прогноз погоды";
    $description = "Прогноз погоды радио ТВ или торгового центра";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

    <h1>{{$title}}</h1>

@endsection

