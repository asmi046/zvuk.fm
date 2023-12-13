<?php

namespace App\Orchid\Screens\Menu;

use Orchid\Screen\Screen;

use App\Models\Menu;
use App\Orchid\Layouts\Menu\MenuListTable;

use Orchid\Screen\Actions\Link;
use Orchid\Support\Color;
use Orchid\Support\Facades\Toast;

use Orchid\Filter\Filterable;

class MenuListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            "menu" => Menu::select()->filters()->defaultSort('order')->paginate(15)
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Меню на главной странице';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Добавить пункт')->route('platform.menu_create')->type(Color::SUCCESS())
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            MenuListTable::class
        ];
    }


    public function delete_field($id) {
        $dell_elem = Menu::where('id', $id)->first();
        if ($dell_elem ) {
            $dell_elem->delete();
            Toast::info("Запись удалена");
        } else {
            Toast::info("Ошибка при удалении");
        }
    }
}
