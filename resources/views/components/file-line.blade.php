<div class="files_line">
    <div class="col">
        <span>Файл</span>
        <a href="{{$item["href"]}}">{{$item["clear_name"]}}</a>
        @if ($user->uid == 1)
            <p class="comment">{{$item['comment']}}</p>
        @endif
    </div>

    <div class="col">
        <span>Размер</span>
        {{$item["data"]}}
    </div>

    <div class="col">
        <span>Дата</span>
        {{$item["size"]}}
    </div>

    <div class="col">
        <span>Загрузка</span>
        <a class="download_btn" href="{{$item["href"]}}" download>Скачать</a>
    </div>
</div>
