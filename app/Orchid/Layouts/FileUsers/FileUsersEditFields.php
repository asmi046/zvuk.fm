<?php

namespace App\Orchid\Layouts\FileUsers;

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

class FileUsersEditFields extends Rows
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

            Input::make('fileuser.uid')
                ->title('UID')
                ->type('number')
                ->help('UID пользователя')
                ->required()
                ->horizontal(),


            Input::make('fileuser.name')
                ->title('Логин')
                ->required()
                ->help('Имя пользователя (login)')
                ->horizontal(),

            Input::make('fileuser.comment')
                ->title('Кооментарий')
                ->help('Комментарий к пользователю')
                ->horizontal(),
            Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
        ];
    }
}
