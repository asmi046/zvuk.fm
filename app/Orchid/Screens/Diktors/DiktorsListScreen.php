<?php

namespace App\Orchid\Screens\Diktors;

use Orchid\Screen\Screen;

use App\Models\Diktor;
use App\Orchid\Layouts\Diktors\DiktorsListTable;

use Orchid\Screen\Actions\Link;
use Orchid\Support\Color;
use Orchid\Support\Facades\Toast;

class DiktorsListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            "diktors" => Diktor::orderByDesc("created_at")->paginate(15)
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Дикторы';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Добавить диктора')->route('platform.diktors_create')->type(Color::SUCCESS())
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
            DiktorsListTable::class
        ];
    }


    public function delete_field($id) {
        $dell_elem = Diktor::where('id', $id)->first();
        if ($dell_elem ) {
            $dell_elem->delete();
            Toast::info("Запись удалена");
        } else {
            Toast::info("Ошибка при удалении");
        }
    }
}
