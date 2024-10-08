@extends('layouts.all')

@php
    $title = "Благодарим за обращение";
    $description = "Благодарим за обращение";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')
    <x-breadcrumbs :title="$title"></x-breadcrumbs>
    <h1>{{$title}}</h1>

    <div class="text_styles">
        <p>Наши специалисты свяжутся с Вами в ближайшее время.</p>

        @if (request()->get("uniq_code"))
            <p>
                {!! QrCode::size(200)->generate(config('studio.tg_bot').request()->get("uniq_code")); !!}
            </p>
            <p>Отсканируйте Qr код и получайте оповещение в Telegram о статусе Вашего заказа. <br><br> Если неудобно сканировать, Вы можете <a href="{{config('studio.tg_bot').request()->get("uniq_code")}}">перейти по ссылке</a></p>

            <div class="qr_message">
                <div class="warning_icon"></div>
                <div class="text">
                    {!! $options['message_qr'] !!}
                </div>
            </div>

        @endif

    </div>

@endsection

