<?php

declare(strict_types=1);

use App\Orchid\Screens\Examples\ExampleActionsScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleGridScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

use App\Orchid\Screens\FileUsers\FileUsersCreateScreen;
use App\Orchid\Screens\FileUsers\FileUsersEditScreen;
use App\Orchid\Screens\FileUsers\FileUsersListScreen;

use App\Orchid\Screens\AudioFiles\AudioFilesCreateScreen;
use App\Orchid\Screens\AudioFiles\AudioFilesEditScreen;
use App\Orchid\Screens\AudioFiles\AudioFilesListScreen;

use App\Orchid\Screens\Menu\MenuCreateScreen;
use App\Orchid\Screens\Menu\MenuEditScreen;
use App\Orchid\Screens\Menu\MenuListScreen;

use App\Orchid\Screens\Page\PageCreateScreen;
use App\Orchid\Screens\Page\PageEditScreen;
use App\Orchid\Screens\Page\PageListScreen;

use App\Orchid\Screens\Diktors\DiktorsCreateScreen;
use App\Orchid\Screens\Diktors\DiktorsEditScreen;
use App\Orchid\Screens\Diktors\DiktorsListScreen;

use App\Orchid\Screens\Diktors\DiktorIntervalCreateScreen;
use App\Orchid\Screens\Diktors\DiktorIntervalEditScreen;

use App\Orchid\Screens\Options\OptionsList;
use App\Orchid\Screens\Options\EditOptions;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Опции
Route::screen('/options', OptionsList::class)
    ->name('platform.options')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Опции'), route("platform.options")));

Route::screen('/options/{id}/edit', EditOptions::class)
    ->name('platform.options_edit')->breadcrumbs(fn (Trail $trail, $id) => $trail
    ->parent('platform.options')
    ->push(__('Редактирование опции'), route('platform.options_edit', $id)));



// Пользователи скачивающие файлы
Route::screen('/fileusers', FileUsersListScreen::class)
    ->name('platform.fileusers')->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.index')
    ->push(__('Пользователи скачивающие файлы'), route('platform.fileusers')));

Route::screen('/fileusers/{id}/edit', FileUsersEditScreen::class)
    ->name('platform.fileusers_edit')->breadcrumbs(fn (Trail $trail, $id) => $trail
    ->parent('platform.fileusers')
    ->push(__('Редактирование пользователя файлов'), route('platform.fileusers_edit', $id)));

Route::screen('/fileusers/create', FileUsersCreateScreen::class)
    ->name('platform.fileusers_create')->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.fileusers')
    ->push(__('Добавление пользователя файлов'), route('platform.fileusers_create')));

// Аудиоролики
Route::screen('/audio_roliki', AudioFilesListScreen::class)
    ->name('platform.audio_roliki')->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.index')
    ->push(__('Аудиоролики'), route('platform.audio_roliki')));

Route::screen('/audio_roliki/{id}/edit', AudioFilesEditScreen::class)
    ->name('platform.audio_roliki_edit')->breadcrumbs(fn (Trail $trail, $id) => $trail
    ->parent('platform.audio_roliki')
    ->push(__('Редактирование аудиоролика'), route('platform.audio_roliki_edit', $id)));

Route::screen('/audio_roliki/create', AudioFilesCreateScreen::class)
    ->name('platform.audio_roliki_create')->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.audio_roliki')
    ->push(__('Добавление аудиоролика'), route('platform.audio_roliki_create')));


// Дикторы
Route::screen('/diktors', DiktorsListScreen::class)
    ->name('platform.diktors')->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.index')
    ->push(__('Дикторы'), route('platform.diktors')));

Route::screen('/diktors/{id}/edit', DiktorsEditScreen::class)
    ->name('platform.diktors_edit')->breadcrumbs(fn (Trail $trail, $id) => $trail
    ->parent('platform.diktors')
    ->push(__('Редактирование диктора'), route('platform.diktors_edit', $id)));

Route::screen('/diktors/create', DiktorsCreateScreen::class)
    ->name('platform.diktors_create')->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.diktors')
    ->push(__('Добавление диктора'), route('platform.diktors_create')));

Route::screen('/diktors/price/{id}/edit', DiktorIntervalEditScreen::class)
    ->name('platform.diktors_price_edit')->breadcrumbs(fn (Trail $trail, $id) => $trail
    ->parent('platform.diktors')
    ->push(__('Редактирование интервала и цен'), route('platform.diktors_price_edit', $id)));

Route::screen('/diktors/{id}/price/create', DiktorIntervalCreateScreen::class)
    ->name('platform.diktors_price_create')->breadcrumbs(fn (Trail $trail, $id) => $trail
    ->parent('platform.diktors')
    ->push(__('Создание интервала и цен'), route('platform.diktors_price_create', $id)));


// Меню
Route::screen('/menu', MenuListScreen::class)
    ->name('platform.menu')->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.index')
    ->push(__('Меню'), route('platform.menu')));

Route::screen('/menu/{id}/edit', MenuEditScreen::class)
    ->name('platform.menu_edit')->breadcrumbs(fn (Trail $trail, $id) => $trail
    ->parent('platform.menu')
    ->push(__('Редактирование пункта меню'), route('platform.menu_edit', $id)));

Route::screen('/menu/create', MenuCreateScreen::class)
    ->name('platform.menu_create')->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.menu')
    ->push(__('Добавление пункта меню'), route('platform.menu_create')));

// Страницы
Route::screen('/page', PageListScreen::class)
    ->name('platform.page')->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.index')
    ->push(__('Страницы'), route('platform.page')));

Route::screen('/page/{id}/edit', PageEditScreen::class)
    ->name('platform.page_edit')->breadcrumbs(fn (Trail $trail, $id) => $trail
    ->parent('platform.page')
    ->push(__('Редактирование страницы'), route('platform.page_edit', $id)));

Route::screen('/page/create', PageCreateScreen::class)
    ->name('platform.page_create')->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.page')
    ->push(__('Добавление страницы'), route('platform.page_create')));


// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Example Screen'));

Route::screen('/examples/form/fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('/examples/form/advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');
Route::screen('/examples/form/editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('/examples/form/actions', ExampleActionsScreen::class)->name('platform.example.actions');

Route::screen('/examples/layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('/examples/grid', ExampleGridScreen::class)->name('platform.example.grid');
Route::screen('/examples/charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('/examples/cards', ExampleCardsScreen::class)->name('platform.example.cards');

//Route::screen('idea', Idea::class, 'platform.screens.idea');
