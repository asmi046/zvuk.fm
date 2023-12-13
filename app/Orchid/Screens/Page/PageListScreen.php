<?php

namespace App\Orchid\Screens\Page;

use Orchid\Screen\Screen;

use App\Models\Page;
use App\Orchid\Layouts\Page\PageListTable;

use Orchid\Screen\Actions\Link;
use Orchid\Support\Color;
use Orchid\Support\Facades\Toast;

use Orchid\Filter\Filterable;

class PageListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            "pages" => Page::select()->filters()->defaultSort('created_at')->paginate(15)
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Страницы';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Добавить страницу')->route('platform.page_create')->type(Color::SUCCESS())
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            PageListTable::class
        ];
    }


    public function delete_field($id) {
        $dell_elem = Page::where('id', $id)->first();
        if ($dell_elem ) {
            $dell_elem->delete();
            Toast::info("Запись удалена");
        } else {
            Toast::info("Ошибка при удалении");
        }
    }
}
