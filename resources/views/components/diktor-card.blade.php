<div class="dictor_card">
    <div class="photo">
        <img src="{{$item->img}}" alt="Диктор {{$item->name}}">
    </div>
    <div class="info">
        <div class="text">
            <h2>{{$item->name}}</h2>
            <p>{{$item->description}}</p>
        </div>
        <div class="audio">
            <x-audio-player :src="$item->file"></x-audio-player>
        </div>
    </div>
</div>
