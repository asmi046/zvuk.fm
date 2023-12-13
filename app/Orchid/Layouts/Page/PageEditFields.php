<?php

namespace App\Orchid\Layouts\Page;

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


class PageEditFields extends Rows
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

            Input::make('page.title')
                ->title('Заголовок страницы')
                ->required()
                ->help('Заголовок страницы')
                ->horizontal(),

            Input::make('page.slug')
                ->title('Ссылка')

                ->help('Ссылка на страницу')
                ->horizontal(),

            Picture::make('page.img')
                ->title('Изображение')
                ->storage('public')
                ->targetRelativeUrl(),

            Quill::make('page.description')
                ->title('Текст')
                ->help('Полный текст страницы'),

            Input::make('page.seo_title')
                ->title('SEO заголовок')
                ->help('SEO заголовок')
                ->horizontal(),

            TextArea::make('page.seo_description')
                ->title('SEO описание')
                ->help('SEO описание')
                ->horizontal(),


            Button::make('Сохранить')->method('save_info')->type(Color::SUCCESS())
        ];
    }
}
