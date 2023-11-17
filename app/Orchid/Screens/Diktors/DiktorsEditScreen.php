<?php

namespace App\Orchid\Screens\Diktors;

use Orchid\Screen\Screen;

use App\Models\Diktor;

use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;

use Orchid\Support\Color;

use App\Orchid\Layouts\Diktors\DiktorsEditFields;
use App\Orchid\Layouts\Diktors\DiktorPricesListTable;

use Illuminate\Http\Request;

use Orchid\Screen\Fields\TextArea;

use Illuminate\Validation\Rule;

class DiktorsEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

     public $diktor;
     public $price;

    public function query($id): iterable
    {
        $dictor = Diktor::where('id',$id)->first();
        return [
            "diktor" => $dictor,
            "price" => $dictor->price_table
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Редактирование диктора: '.$this->diktor->name;
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

            Layout::tabs([
                'Данные диктора' => [
                    DiktorsEditFields::class,
                ],

                'Цены'      => [

                    DiktorPricesListTable::class
                ],
            ]),


        ];
    }

    public function save_info(Request $request) {

        $request->validate([
            'diktor.uid' => ['required', 'integer',  Rule::unique('file_users', 'uid')->ignore($this->diktor->id)],
            'diktor.name' => ['required', 'string']
        ]);



        $this->diktor->fill($request->get('diktor'))->save();

        Toast::info("Запись сохранена");

    }

    public function delete_price_field($id) {

        $dell_elem = $this->diktor->price_table()->where('id', $id)->first();
        if ($dell_elem) {
            $dell_elem->delete();
            Toast::info("Запись удалена");
        } else {
            Toast::info("Ошибка при удалении");
        }
    }
}
