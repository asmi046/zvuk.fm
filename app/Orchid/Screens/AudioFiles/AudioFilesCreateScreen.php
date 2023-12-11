<?php

namespace App\Orchid\Screens\AudioFiles;

use Orchid\Screen\Screen;

use App\Models\Audiofile;

use Orchid\Support\Facades\Layout;

use App\Orchid\Layouts\AudioFiles\AudioFilesEditFields;


use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


class AudioFilesCreateScreen extends Screen
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
        return 'Создание нового аудиофайлы';
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
            AudioFilesEditFields::class,
        ];
    }

    public function save_info(Request $request) {


        $request->validate([
            'audio.name' => ['required', 'string'],
            'audio.price' => ['required', 'string'],
            'audio.type' => ['required', 'string'],
        ]);

        $data = $request->get('audio');

        if ($request->file('load.file')) {
            $file = $request->file('load.file');
            $file_name = $file->getClientOriginalName();
            Storage::disk('public')->put(basename($file_name), file_get_contents($file), 'public');
            $data['file'] =Storage::url(basename($file_name));
        } else {
            $data['file'] = "#";
        }


        $item = Audiofile::create($data);

        return redirect()->route('platform.audio_roliki_edit', $item);
    }
}
