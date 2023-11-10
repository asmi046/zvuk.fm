@extends('layouts.all')

@php
    $title = "Политика в области обработки персональных данных";
    $description = "Политика в области обработки персональных данных";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')
    <x-breadcrumbs :title="$title"></x-breadcrumbs>
    <h1>{{$title}}</h1>
    {!! $options['policy'] !!}
@endsection

