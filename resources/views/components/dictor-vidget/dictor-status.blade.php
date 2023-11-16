<div class="row">
    <span><a target="_blank" href="{{$item->actor->audio}}">{{$item->actor->name}}</a></span>
    <span
    @class(["status",
        "active" => ($item->status === "в студии до")||($item->status === "ожидается к"),
        "no_active" => ($item->status === "записан")
    ])
    >{{$item->status}}</span>
    @if ($item->status === "записан")
        <span></span>
    @endif

    @if ($item->status === "в студии до")
        <span>{{date("H:i", strtotime($item->time_start))}}</span>
    @endif

    @if ($item->status === "ожидается к")
        <span>{{date("H:i", strtotime($item->time_start))}}</span>
    @endif
</div>
