<p>email: {!! $formData['email'] !!}</p>
<p>Дата: {{date('d.m.Y H:i:s')}}</p>
<p>Тип заказа: {{ $formData['zak_type'] }}</p>
<h3>Текст:</h3>
{!! $formData['content'] !!}
<br>

<p>Хронометраж: {{ $formData['standart_chrono'] }}</p>
<p>Требуемый хронометраж: {{ $formData['wonted_chrono'] }}</p>

<h3>Актеры:</h3>
@foreach ( $formData['diktors'] as $item)
    <p>{{$item}}</p>
@endforeach

<h3>Пожелания:</h3>
{!! $formData['comment'] !!}
<br>
<p>Телефон: {!! $formData['phone'] !!}</p>


@if (!empty($formData['files']))
    <h3>Прикрепленный файл:</h3>
    <p><a href="{{ config('app.url').Storage::url("order_files/".$formData['files']->getClientOriginalName()) }}">{{$formData['files']->getClientOriginalName()}}</a></p>
@endif

