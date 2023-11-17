<?php

namespace App\Orchid\Screens\Diktors;

use Orchid\Screen\Screen;

use App\Models\Diktor;

use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;

use Orchid\Support\Color;

use App\Orchid\Layouts\Diktors\DiktorsEditFields;
use App\Orchid\Layouts\Diktors\DiktorPricesListTable;

use Illuminate\Http\Request;

use Orchid\Screen\Fields\TextArea;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Storage;

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
        return [
            Link::make('Добавить интервал')
            ->href(route("platform.diktors_price_create", $this->diktor->id))
            ->icon('hourglass-split'),
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
            'diktor.name' => ['required', 'string'],
            'diktor.description' => ['required', 'string'],
            'diktor.gender' => ['required', 'string'],
        ]);

        $data = $request->get('diktor');
        if ($request->file('load.file')) {
            $file = $request->file('load.file');
            $file_name = $file->getClientOriginalName();
            Storage::disk('public')->put(basename($file_name), file_get_contents($file), 'public');
            $data['file'] =Storage::url(basename($file_name));
        }

        if ($request->file('load.file_irv')) {
            $file = $request->file('load.file_irv');
            $file_name = $file->getClientOriginalName();
            Storage::disk('public')->put(basename($file_name), file_get_contents($file), 'public');
            $data['file_irv'] =Storage::url(basename($file_name));
        }

        $this->diktor->fill($data)->save();

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
