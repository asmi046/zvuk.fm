<?php

namespace App\Orchid\Layouts\Diktors;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

use Orchid\Screen\Fields\Group;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;

use Orchid\Screen\Actions\DropDown;

use App\Models\Category;

use Orchid\Support\Color;

class DiktorsListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'diktors';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'id')->width("10%"),
            TD::make('name', 'Имя')->width("30%"),
            TD::make('gender', 'Пол')->width("10%"),
            TD::make('description', 'Описание')->width("45%")->render(function($element) {
                return  mb_strimwidth(strip_tags($element->description), 0, 60, "...");
            }),



            TD::make(__('Actions'))
            ->align(TD::ALIGN_CENTER)
            ->width('5%')
            ->render(fn ($element) => DropDown::make()
                ->icon('chat-right-dots')
                ->list([

                    Link::make('Редактировать')
                        ->route('platform.diktors_edit',$element->id)
                        ->icon('pencil'),

                    Button::make('Копировать')
                        ->icon('copy')
                        ->confirm(__('Будет создана копия данной запис! Вы согласны?'))
                        ->method('copy_field', ["id" => $element->id]),

                    Button::make('Удалить')
                        ->icon('trash')
                        ->confirm(__('Данная категория будет удалена навсегда! Вы согласны?'))
                        ->method('delete_field', ["id" => $element->id]),
                ])),

        ];
    }
}
