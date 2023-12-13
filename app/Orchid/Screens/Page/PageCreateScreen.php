<?php

namespace App\Orchid\Screens\Page;

use Orchid\Screen\Screen;

use App\Models\Page;

use Orchid\Support\Facades\Layout;

use App\Orchid\Layouts\Page\PageEditFields;


use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


class PageCreateScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

    public function query(): iterable
    {
        return [];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Создание новой страницы';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            PageEditFields::class,
        ];
    }

    public function save_info(Request $request) {


        $request->validate([
            'page.title' => ['required', 'string'],
        ]);

        $data = $request->get('page');

        $item = Page::create($data);

        return redirect()->route('platform.page_edit', $item);
    }
}
