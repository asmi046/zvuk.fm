const iconMenu = document.querySelector(".icon-menu");
const body = document.querySelector("body");
const menuBody = document.querySelector(".mob-menu");

//BURGER
if (iconMenu) {
	iconMenu.addEventListener("click", function () {
		iconMenu.classList.toggle("active");
		body.classList.toggle("_lock");
		menuBody.classList.toggle("active");
	});
}

// Закрытие моб меню при клике вне области меню
window.addEventListener('click', e => {
	const target = e.target // находим элемент, на котором был клик
	if (!target.closest('.icon-menu') && !target.closest('.mob-menu') && !target.closest('.header__mob-search-btn') && !target.closest('.header__search-mob') && !target.closest('._popup-link') && !target.closest('.popup')) { // если этот элемент или его родительские элементы не окно навигации и не кнопка
		iconMenu.classList.remove('active') // то закрываем окно навигации, удаляя активный класс
		menuBody.classList.remove('active')
		body.classList.remove('_lock')
	}
})
