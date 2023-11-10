@extends('layouts.all')

@php
    $title = "Наши преимущества";
    $description = "Преимущества работы со студией Эпицентр";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

    <h1>{{$title}}</h1>

    <div class="main_reclama">
        <div class="wrapper">
            <div class="rblk">
                <h3>Низкая стоимость</h3>
                <p>Для Вас наша низкая цена является низкой себестоимостью, что позволяет увеличить Вашу собственную прибыль.</p>
            </div>

            <div class="rblk">
                <h3>Оперативность</h3>
                <p>Все заказы выполняются точно в указанный срок. Планируйте свое время и положитесь на нас.</p>
            </div>

            <div class="rblk">
                <h3>Качество</h3>
                <p>Опытные дикторы и актеры озвучки, опытные звукорежисеры, вот что позволяет нам гарантировать качество нашей работы.</p>
            </div>
        </div>
    </div>

@endsection

