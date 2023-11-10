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
                <li><a href="#">Изготовление аудиороликов</a></li>
                <li><a href="#">Дикторские голоса</a></li>
                <li><a href="#">Радиоролики для торговых центров</a></li>
                <li><a href="#">Голосовые приветствия</a></li>
                <li><a href="#">Оформление эфира</a></li>
                <li><a href="#">Озвучка видео роликов</a></li>
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
            <h1>Изготовление радиорекламы, озвучка рекламы</h1>
            <p>В нашей студии работает система автоматического управления заказами, привязанная к сайту, поэтому в первую очередь обрабатываются и выполняются те заказы, которые Вы отправили через форму на сайте.</p>
            <p>Дикторская начитка, голос диктора, аудиореклама, радиоролики, озвучка текста, диктор онлайн скачать, база дикторских голосов</p>
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
        <h2>Время работы</h2>
        <p>Друзья! Студия "Эпицентр" ZVUK.FM работает с 11:00 по московскому времени и до окончания изготовления записанных в течение дня голосов и аудиороликов.</p>

        <p>Отправить задание на изготовление аудиорекламы, запись дикторского голоса или производство звукофайла IVR можно круглосуточно через форму on-line заказа.</p>

        <p>Консультации по телефону начинаются после 11:00 ежедневно, кроме субботы и воскресения. Актёры появляются в студии по расписанию.</p>

        <p>Изготовление аудиорекламы, радиорекламы, аудиороликов, радиороликов, банк голосов дикторов, голосовые приветствия, озвучка текста.</p>
    </div>

    <div class="main_reclama">
        <h2>Аудиореклама</h2>
        <div class="wrapper">
            <div class="rblk">
                <h3>Студия радиорекламы "Эпицентр"</h3>
                <p>Изготовление радиороликов.Дикторские голоса. Запись голосовых приветсвий и корпоративных автоответчиков.</p>
            </div>

            <div class="rblk">
                <h3>Дикторские <br/>голоса</h3>
                <p>Дикторские голоса, это дикторы, актёры театра - специалисты в области озвучки радиорекламы.</p>
            </div>

            <div class="rblk">
                <h3>Начитка <br/>текста</h3>
                <p>Начитка текста - это несколько дублей прочтения вашего текста голосом диктора. Мы продаём дикторские голоса. 300 рублей за текст радиоролика.</p>
            </div>
        </div>
    </div>

@endsection

