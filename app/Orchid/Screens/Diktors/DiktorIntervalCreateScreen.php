<?php

namespace App\Orchid\Screens\Diktors;

use Orchid\Screen\Screen;

use App\Models\Price;
use App\Models\Diktor;

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

class DiktorIntervalCreateScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

     public $diktor;

    public function query($id): iterable
    {
        $diktor = Diktor::where('id',$id)->first();
        return [
            "diktor" => $diktor,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Редактирование интервала для диктора: '.$this->diktor->name;
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
            ->href(route("platform.diktors_edit", $this->diktor->id))
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

        $data = $request->get('interval');
        $data['diktor_id'] = $this->diktor->id;


        $element_id = Price::create($data);

        return redirect()->route('platform.diktors_price_edit', $element_id);

    }

}
