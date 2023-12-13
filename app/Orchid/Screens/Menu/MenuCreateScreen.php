<?php

namespace App\Orchid\Screens\Menu;

use Orchid\Screen\Screen;

use App\Models\Menu;

use Orchid\Support\Facades\Layout;

use App\Orchid\Layouts\Menu\MenuEditFields;


use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


class MenuCreateScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

    public function query(): iterable
    {
        return [];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Создание нового пункта меню';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            MenuEditFields::class,
        ];
    }

    public function save_info(Request $request) {


        $request->validate([
            'menu.title' => ['required', 'string'],
            'menu.lnk' => ['required', 'string'],
            'menu.order' => ['required', 'integer'],
        ]);

        $data = $request->get('menu');

        $item = Menu::create($data);

        return redirect()->route('platform.menu_edit', $item);
    }
}
