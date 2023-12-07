<div class="dictor_card">
    <div class="photo">
        @if (!empty($item->img))
            <img src="{{$item->img}}" alt="Диктор {{$item->name}}">
        @else
            <img src="{{asset('img/no_photo.jpg')}}" alt="Диктор {{$item->name}}">
        @endif

    </div>
    <div class="info">
        <div class="text">
            <h2>{{$item->name}}</h2>
            <p>{!! $item->description !!}</p>
            <p><strong>{{$item->price_table[0]->system_cost}} ₽</strong></p>
        </div>
        <div class="audio">
            <x-audio-player :src="$item->file"></x-audio-player>
        </div>
    </div>
</div>
