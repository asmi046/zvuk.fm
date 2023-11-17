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

class DiktorsEditFields extends Rows
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

            Input::make('diktor.name')
                ->title('Имя')
                ->required()
                ->help('Имя диктора')
                ->horizontal(),

            Input::make('diktor.gender')
                ->title('Пол')
                ->required()
                ->help('Пол диктора')
                ->horizontal(),

            Input::make('diktor.order')
                ->type('number')
                ->title('Порядок вывода')
                ->help('порядок вывода на сайте')
                ->horizontal(),

            Quill::make('diktor.description')
                ->title('Описание')
                ->help('Введите описание диктора')
                ->horizontal(),


            Switcher::make('diktor.irv')
                ->sendTrueOrFalse()
                ->title('IVR')
                ->placeholder('Может записывать IVR')
                ->horizontal()
                ->help('Запись IVR'),


            Picture::make('diktor.img')
                ->title('Фото диктора')
                ->storage('public')
                ->targetRelativeUrl()
                ->horizontal(),

            Input::make('diktor.file')
                ->title('Пример голоса')
                ->disabled()
                ->horizontal(),


            Input::make('load.file')
                ->type('file')
                ->accept("audio/*")
                ->title('Загрузить пример голоса')
                ->help('Загрузить пример голоса диктора')
                ->horizontal(),

            Input::make('diktor.file_irv')
                ->title('Пример голоса IVR')
                ->disabled()
                ->horizontal(),

            Input::make('load.file_irv')
                ->type('file')
                ->accept("audio/*")
                ->title('Загрузить пример голоса IVR')
                ->help('Загрузить голоса диктора IVR')
                ->horizontal(),

            Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
        ];
    }
}
