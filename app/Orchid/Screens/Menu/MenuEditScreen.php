<?php

namespace App\Orchid\Screens\Menu;

use Orchid\Screen\Screen;

use App\Models\Menu;

use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;

use Orchid\Support\Color;

use App\Orchid\Layouts\Menu\MenuEditFields;

use Illuminate\Http\Request;

use Orchid\Screen\Fields\TextArea;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Storage;

class MenuEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

     public $menu;

    public function query($id): iterable
    {
        return [
            "menu" => Menu::where('id',$id)->first()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Редактирование пункта меню: '.$this->menu->title;
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


        $this->menu->fill($data)->save();

        Toast::info("Запись сохранена");
    }
}
