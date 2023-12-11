<?php

namespace App\Orchid\Screens\AudioFiles;

use Orchid\Screen\Screen;

use App\Models\Audiofile;
use App\Orchid\Layouts\AudioFiles\AudioFilesListTable;

use Orchid\Screen\Actions\Link;
use Orchid\Support\Color;
use Orchid\Support\Facades\Toast;

use Orchid\Filter\Filterable;

class AudioFilesListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            "audio" => Audiofile::orderByDesc("created_at")->filters()->paginate(15)
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Аудиоролики для демонстрации';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Добавить ролик')->route('platform.audio_roliki_create')->type(Color::SUCCESS())
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
            AudioFilesListTable::class
        ];
    }


    public function delete_field($id) {
        $dell_elem = Audiofile::where('id', $id)->first();
        if ($dell_elem ) {
            $dell_elem->delete();
            Toast::info("Запись удалена");
        } else {
            Toast::info("Ошибка при удалении");
        }
    }
}
