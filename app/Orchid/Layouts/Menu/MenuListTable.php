<?php

namespace App\Orchid\Layouts\Menu;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

use Orchid\Screen\Fields\Group;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;

use Orchid\Screen\Actions\DropDown;

use App\Models\Category;

use Orchid\Support\Color;

class MenuListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'menu';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('order', 'Порядок вывода')->sort()->width("5%"),
            TD::make('title', 'Анкор ссылки')->sort()->width("40%"),
            TD::make('lnk', 'Ссылка')->sort()->width("40%"),


            TD::make(__('Actions'))
            ->align(TD::ALIGN_CENTER)
            ->width('5%')
            ->render(fn ($element) => DropDown::make()
                ->icon('chat-right-dots')
                ->list([

                    Link::make('Редактировать')
                        ->route('platform.menu_edit',$element->id)
                        ->icon('pencil'),

                    Button::make('Удалить')
                        ->icon('trash')
                        ->confirm(__('Данная категория будет удалена навсегда! Вы согласны?'))
                        ->method('delete_field', ["id" => $element->id]),
                ])),

        ];
    }
}
