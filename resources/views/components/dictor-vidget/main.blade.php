<div class="dictors_vidget">
    <h2>{{$name}}</h2>
    <span class="data">
        {{ dictors_day_str($data->date)}}
    </span>
    <div class="table">
        @foreach ($data->data as $item)
            <x-dictor-vidget.dictor-status :item="$item"></x-dictor-vidget.dictor-status>
        @endforeach
    </div>
</div>
