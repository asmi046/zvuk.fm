<?php

namespace App\Orchid\Layouts\FileUsers;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

use Orchid\Screen\Fields\Group;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;

use Orchid\Screen\Actions\DropDown;

use App\Models\Category;

use Orchid\Support\Color;

class FileUsersListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'FileUserss';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('uid', 'uid')->width("10%"),
            TD::make('name', 'Заголовок')->width("30%"),
            TD::make('comment', 'Комментарий')->width("55%")->render(function($element) {
                return  mb_strimwidth(strip_tags($element->comment), 0, 30, "...");
            }),



            TD::make(__('Actions'))
            ->align(TD::ALIGN_CENTER)
            ->width('5%')
            ->render(fn ($element) => DropDown::make()
                ->icon('chat-right-dots')
                ->list([

                    Link::make('Редактировать')
                        ->route('platform.fileusers_edit',$element->id)
                        ->icon('pencil'),

                    Button::make('Удалить')
                        ->icon('trash')
                        ->confirm(__('Данная категория будет удалена навсегда! Вы согласны?'))
                        ->method('delete_field', ["id" => $element->id]),
                ])),

        ];
    }
}
