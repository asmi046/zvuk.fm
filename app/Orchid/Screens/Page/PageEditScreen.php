<?php

namespace App\Orchid\Screens\Page;

use Orchid\Screen\Screen;

use App\Models\Page;

use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;

use Orchid\Support\Color;

use App\Orchid\Layouts\Page\PageEditFields;

use Illuminate\Http\Request;

use Orchid\Screen\Fields\TextArea;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Storage;

class PageEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

     public $page;

    public function query($id): iterable
    {
        return [
            "page" => Page::where('id', $id)->first()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Редактирование страницу: '.$this->page->title;
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


        $this->page->fill($data)->save();

        Toast::info("Запись сохранена");
    }
}
