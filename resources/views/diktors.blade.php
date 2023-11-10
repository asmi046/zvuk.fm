@extends('layouts.all')

@php
    $title = "Дикторские голоса | голоса актёров, стоимость, цена, диктор";
    $description = "Примеры дикторских голосов, прочтение рекламного текста актёром. Цена и стоимость голоса диктора";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')
    <x-breadcrumbs :title="$title"></x-breadcrumbs>
    <h1>{{$title}}</h1>
    <div class="dictors_list">
        @foreach ($diktors as $item)
            <x-diktor-card :item="$item"></x-diktor-card>
        @endforeach
    </div>
@endsection

