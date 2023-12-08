<?php

namespace App\Orchid\Screens\Diktors;

use Orchid\Screen\Screen;

use App\Models\Diktor;
use App\Orchid\Layouts\Diktors\DiktorsListTable;

use Orchid\Screen\Actions\Link;
use Orchid\Support\Color;
use Orchid\Support\Facades\Toast;

use Orchid\Filter\Filterable;


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
            "diktors" => Diktor::select()->filters()->defaultSort('order')->paginate(30)
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

    public function copy_field($id) {
        $main_elem = Diktor::with('price_table')->where('id', $id)->first();
        $new_element = $main_elem->replicate();
        $new_element->created_at = date("Y-m-d H:i:s", strtotime("now"));
        $new_element->name = $new_element->name." (Копия)";
        $new_element->save();

        $new_element_id = $new_element->id;

        foreach($main_elem->price_table as $item) {
            $new_element = $item->replicate();
            $new_element->created_at = date("Y-m-d H:i:s", strtotime("now"));
            $new_element->diktor_id = $new_element_id;
            $new_element->save();
        }
    }
}
