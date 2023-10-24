@extends('layouts.all')

@php
    $title = "Cтудия Эпицентр ZVUK.FM | Изготовление радиорекламы | озвучка рекламы| дикторские голоса | аудиореклама | радиореклама";
    $description = "Изготовление радиорекламы, озвучка рекламы. Производство радиороликов,  Дикторские голоса, озвучка текста. Дикторская начитка.";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

    <div class="main_bnr">
        <img src="{{asset('../img/main_bnr.webp')}}" alt="">
    </div>

@endsection

