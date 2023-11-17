<?php

namespace App\Orchid\Screens\Diktors;

use Orchid\Screen\Screen;

use App\Models\Price;

use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;

use Orchid\Support\Color;

use App\Orchid\Layouts\Diktors\DiktorPriceEditFields;

use Illuminate\Http\Request;

use Orchid\Screen\Fields\TextArea;

use Illuminate\Validation\Rule;

class DiktorIntervalEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

     public $interval;

    public function query($id): iterable
    {
        $interval = Price::with('dictor_info')->where('id',$id)->first();
        return [
            "interval" => $interval,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Редактирование интервала для диктора: '.$this->interval->dictor_info->name;
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Назад')
            ->href(route("platform.diktors_edit", $this->interval->dictor_info->id))
            ->icon('arrow-up-left'),
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
            DiktorPriceEditFields::class
        ];
    }

    public function save_info(Request $request) {

        $request->validate([
            "interval.start" => ['required', 'integer'],
            "interval.finish" => ['required', 'integer'],
            "interval.cost" => ['required', 'numeric'],
            "interval.system_cost" => ['required', 'numeric'],
            "interval.sample_cost" => ['required', 'numeric'],
            "interval.ivr_cost" => ['required', 'numeric'],
            "interval.dop_cost" => ['required', 'numeric'],
            "interval.obr_standatr" => ['required', 'numeric'],
            "interval.obr_one" => ['required', 'numeric']
        ]);



        $this->interval->fill($request->get('interval'))->save();

        Toast::info("Запись сохранена");

    }

}
