<header id="header" class="header">
	<div class="_container">

		<div class="header_row top_row">
            <a href="{{route("home")}}" class="logo">
                <img src="{{asset("img/logo.svg")}}" alt="Эпицентр рекламы">
            </a>

            <x-header.circl-menu></x-header.circl-menu>

            <button type="button" class="icon-menu" aria-label="Иконка бургера">
				<span></span>
				<span></span>
				<span></span>
			</button>
        </div>


        <x-header.main-menu></x-header.main-menu>

	</div>
</header>

<!-- Мобильное меню -->
<div class="mob-menu header__mob-menu">
	<x-header.circl-menu></x-header.circl-menu>
    <x-header.main-menu></x-header.main-menu>
    <x-sidebar-btn></x-sidebar-btn>
</div>
