<?php

namespace App\Orchid\Layouts\AudioFiles;

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

use App\Models\Category;



class AudioFilesEditFields extends Rows
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

            Input::make('audio.name')
                ->title('Название файла')
                ->required()
                ->help('Название файла')
                ->horizontal(),

            Input::make('audio.type')
                ->title('Тип файла')
                ->required()
                ->help('Тип файла для группировки')
                ->horizontal(),

            Input::make('audio.price')
                ->title('Цена')
                ->required()
                ->help('Цена ролика подобного качества')
                ->horizontal(),


            Input::make('audio.file')
                ->title('Файл')
                ->disabled()
                ->horizontal(),


            Input::make('load.file')
                ->type('file')
                ->accept("audio/*")
                ->title('Загрузить новый файл')
                ->help('Загрузить новый файл убрав старый')
                ->horizontal(),

            Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
        ];
    }
}
