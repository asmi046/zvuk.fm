<?php

namespace App\Orchid\Layouts\Diktors;

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
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Color;

use App\Models\Category;

class DiktorPriceEditFields extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title = "";

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [

            Input::make('interval.start')
                ->title('Начало интервала')
                ->required()
                ->horizontal(),

            Input::make('interval.finish')
                ->title('Конец интервала')
                ->required()
                ->horizontal(),

            Input::make('interval.cost')
                ->title('Цена')
                ->required()
                ->horizontal(),

            Input::make('interval.system_cost')
                ->title('Цена системная')
                ->required()
                ->horizontal(),

            Input::make('interval.sample_cost')
                ->title('Цена ролика')
                ->required()
                ->horizontal(),

            Input::make('interval.ivr_cost')
                ->title('Цена irv')
                ->required()
                ->horizontal(),

            Input::make('interval.ivr_music_cost')
                ->title('Цена irv + музыка')
                ->required()
                ->horizontal(),

            Input::make('interval.dop_cost')
                ->title('Цена за доп')
                ->required()
                ->horizontal(),

            Input::make('interval.obr_standatr')
                ->title('Цена за стандартную обработку голоса')
                ->required()
                ->horizontal(),

            Input::make('interval.obr_one')
                ->title('Цена за обработку голоса в один дубль')
                ->required()
                ->horizontal(),

            Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
        ];
    }
}
