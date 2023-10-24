<header id="header" class="header">
	<div class="_container">

		<div class="header_row top_row">
            <a href="{{route("home")}}" class="logo">
                <img src="{{asset("img/logo.svg")}}" alt="Эпицентр рекламы">
            </a>

            <ul class="header__menu-list menu-list d-flex">
				<li><a href="#"><span class="_audioroliki"></span>Аудиоролики</a></li>
				<li><a href="#"><span class="_dictors"></span>Дикторы</a></li>
				<li><a href="#"><span class="_chrono"></span>Хронометраж</a></li>
				<li><a href="#"><span class="_pay"></span>Оплата</a></li>
				<li><a href="{{route('cantacts')}}"><span class="_contacts"></span>Контакты</a></li>
			</ul>
        </div>


        <div class="header_row bottom_row">
            <a href="#" class="buttons-header__btn btn">Как начать работу</a>
			<a href="#" class="buttons-header__btn btn">Преимущества</a>
			<a href="#" class="buttons-header__btn btn">Фото студии</a>
			<a href="#" class="buttons-header__btn btn">Радио прогноз погоды</a>
			<a href="#" class="buttons-header__btn btn">Голосовые приветствия</a>
        </div>

	</div>
</header>

<!-- Мобильное меню -->
<div class="mob-menu header__mob-menu">
	<ul class="mob-menu__list">
		<li class="mob-menu__item"><a href="#" class="mob-menu__link">Пункт 1</a></li>
		<li class="mob-menu__item"><a href="#" class="mob-menu__link">Пункт 2</a></li>
		<li class="mob-menu__item"><a href="#" class="mob-menu__link">Пункт 3</a></li>
		<li class="mob-menu__item"><a href="#" class="mob-menu__link">Пункт 4</a></li>
		<li class="mob-menu__item"><a href="#" class="mob-menu__link">Пункт 5</a></li>
	</ul>
</div>
