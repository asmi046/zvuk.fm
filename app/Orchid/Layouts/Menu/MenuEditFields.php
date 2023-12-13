<?php

namespace App\Orchid\Layouts\Menu;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Number;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\TextArea;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Picture;
use Orchid\Support\Color;


class MenuEditFields extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title = "Поля пользователя";

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [

            Input::make('menu.title')
                ->title('Анкор пункта меню')
                ->required()
                ->help('Анкор пункта меню')
                ->horizontal(),

            Input::make('menu.lnk')
                ->title('Ссылка')
                ->required()
                ->help('Ссылка пункта меню')
                ->horizontal(),

            Input::make('menu.order')
                ->type('number')
                ->title('Порядок вывода')
                ->required()
                ->help('Порядок вывода')
                ->horizontal(),


            Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
        ];
    }
}
