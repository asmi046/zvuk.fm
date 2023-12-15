<?php

namespace App\Orchid\Screens\Diktors;

use Orchid\Screen\Screen;

use App\Models\Diktor;

use Orchid\Support\Facades\Layout;

use App\Orchid\Layouts\Diktors\DiktorsEditFields;


use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class DiktorsCreateScreen extends Screen
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
        return 'Создание пользователя скачивающего файлы';
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
            DiktorsEditFields::class,
        ];
    }

    public function save_info(Request $request) {

        $request->validate([
            'diktor.name' => ['required', 'string'],
            'diktor.description' => ['required', 'string'],
            'diktor.gender' => ['required', 'string'],
            'diktor.order' => ['required', 'integer'],
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



        $item = Diktor::create($request->get('diktor'));

        return redirect()->route('platform.diktors_edit', $item);
    }
}
