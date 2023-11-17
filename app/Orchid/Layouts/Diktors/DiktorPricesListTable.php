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

class DiktorPricesListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'price';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('start', 'Начало интервала')->width("9%"),
            TD::make('finish', 'Конец интервала')->width("9%"),
            TD::make('cost', 'Цена')->width("9%"),
            TD::make("system_cost", 'Цена системная')->width("9%"),
            TD::make("sample_cost", 'Цена ролика')->width("9%"),
            TD::make("ivr_cost", 'Цена IVR')->width("9%"),
            TD::make("dop_cost", 'Цена за доп')->width("9%"),
            TD::make("obr_standatr", 'Цена за стандартную обработку голоса')->width("9%"),
            TD::make("obr_one", 'Цена за обработку голоса в один дубль')->width("9%"),


            TD::make(__('Actions'))
            ->align(TD::ALIGN_CENTER)
            ->width('5%')
            ->render(fn ($element) => DropDown::make()
                ->icon('chat-right-dots')
                ->list([

                    Link::make('Редактировать')
                        ->route('platform.diktors_price_edit',$element->id)
                        ->icon('pencil'),

                    Button::make('Удалить')
                        ->icon('trash')
                        ->confirm(__('Данная категория будет удалена навсегда! Вы согласны?'))
                        ->method('delete_price_field', ["id" => $element->id]),
                ])),

        ];
    }
}
