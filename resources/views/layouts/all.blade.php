<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">

    <meta property="og:locale" content="ru_RU" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:url" content="{{route('home')}}" />
    <meta property="og:site_name" content="Студия звукозаписи ЭПИЦЕНТР ZVUK.FM" />
    <meta property="og:image" content="{{asset('img/og_img.jpg')}}" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta name="twitter:card" content="summary_large_image" />

    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon256.png')}}" sizes="256x256">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon128.png')}}" sizes="128x128">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon64.png')}}" sizes="64x64">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon32.png')}}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon16.png')}}" sizes="16x16">
    <link rel="icon" type="image/svg" href="{{asset('/img/favicons/fav.svg')}}" sizes="any">

    <meta name="_token" content="{{ csrf_token() }}">

    <meta name="chrono_correct" content="{{ isset($options['chrono_correct'])?$options['chrono_correct']:0 }}">

    <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
            (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

            ym(95846337, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true
            });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/95846337" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    @vite([
        'resources/css/app.css',
        'public/scss/main.scss',
        'resources/js/app.js',
        'public/js/main.js'
    ])
</head>
<body>

    <main id="main">

        <x-header.main></x-header.main>

        <section class="main_section">
            <div class="_container sidebar_section">

                <div class="sidebar_section__content">
                    @yield('main')
                </div>

                <div class="sidebar_section__sidebar">

                    <x-sidebar-btn></x-sidebar-btn>
                    <x-annonce></x-annonce>


                    @if (!empty($schedule_today))
                        <x-dictor-vidget.main name="Актеры на сегодня" :data="$schedule_today"></x-dictor-vidget.main>
                    @endif

                    @if (!empty($schedule_tomorrow))
                        <x-dictor-vidget.main name="Актеры на завтра" :data="$schedule_tomorrow"></x-dictor-vidget.main>
                    @endif


                </div>
            </div>
        </section>


        <x-footer></x-footer>
    </main>

</body>
</html>
