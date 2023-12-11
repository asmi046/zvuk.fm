<?php

namespace App\Orchid\Layouts\AudioFiles;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

use Orchid\Screen\Fields\Group;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;

use Orchid\Screen\Actions\DropDown;

use App\Models\Category;

use Orchid\Support\Color;

class AudioFilesListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'audio';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'id')->width("5%"),
            TD::make('name', 'Название файла')->sort()->width("30%"),
            TD::make('type', 'Тип файла')->sort()->width("30%"),
            TD::make('price', 'Цена (руб.)')->width("20%"),

            TD::make(__('Actions'))
            ->align(TD::ALIGN_CENTER)
            ->width('5%')
            ->render(fn ($element) => DropDown::make()
                ->icon('chat-right-dots')
                ->list([

                    Link::make('Редактировать')
                        ->route('platform.audio_roliki_edit',$element->id)
                        ->icon('pencil'),

                    Button::make('Удалить')
                        ->icon('trash')
                        ->confirm(__('Данная категория будет удалена навсегда! Вы согласны?'))
                        ->method('delete_field', ["id" => $element->id]),
                ])),

        ];
    }
}
