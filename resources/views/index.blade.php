@extends('layouts.all')

@php
    $title = "Cтудия Эпицентр ZVUK.FM | Изготовление радиорекламы | озвучка рекламы| дикторские голоса | аудиореклама | радиореклама";
    $description = "Изготовление радиорекламы, озвучка рекламы. Производство радиороликов,  Дикторские голоса, озвучка текста. Дикторская начитка.";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

    <x-page-banner name="main_bnr.webp"></x-page-banner>

    <div class="main_text_sb">
        <div class="sb">
            <ul class="sb_menu">
                <li><a href="{{route('roliki')}}">Изготовление аудиороликов</a></li>
                <li><a href="{{route('diktors')}}">Дикторские голоса</a></li>
                <li><a href="{{route('pogoda')}}">Прогноз погоды</a></li>
                <li><a href="{{route('privet')}}">Голосовые приветствия</a></li>
                <li><a href="{{route('efir')}}">Оформление эфира</a></li>
                <li><a href="{{route('ozv_rolik')}}">Озвучка видео роликов</a></li>
            </ul>

            <div class="prices">
                <div class="price_info">
                    Дикторские голоса <span>300</span> рублей
                </div>

                <div class="price_info">
                    Радиоролики <span>800</span> рублей
                </div>
            </div>


        </div>
        <div class="text">
            {!! $options["main_text"] !!}
        </div>
    </div>

    <div class="foto_in_main">
        <div class="foto_wrap">
            <img src="{{asset('img/studio/studio-f1.webp')}}" alt="Студия звукозаписи в Курске">
        </div>

        <div class="foto_wrap">
            <img src="{{asset('img/studio/studio-f3.webp')}}" alt="Запись аудиорекламы">
        </div>

        <div class="foto_wrap">
            <img src="{{asset('img/studio/studio-f2.webp')}}" alt="Студия звукозаписи Эпицентр рекламы">
        </div>
    </div>

    <div class="work_time_text">
        {!! $options["work_time"] !!}
    </div>

    <div class="main_reclama">
        <h2>Аудиореклама</h2>
        <div class="wrapper">
            <div class="rblk">
                <h3>{!! $options["arz_1"] !!}</h3>
                <p>{!! $options["art_1"] !!}</p>
            </div>

            <div class="rblk">
                <h3>{!! $options["arz_2"] !!}</h3>
                <p>{!! $options["art_2"] !!}</p>
            </div>

            <div class="rblk">
                <h3>{!! $options["arz_3"] !!}</h3>
                <p>{!! $options["art_3"] !!}</p>
            </div>
        </div>
    </div>

@endsection

