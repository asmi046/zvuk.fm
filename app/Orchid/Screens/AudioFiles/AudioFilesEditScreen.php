<?php

namespace App\Orchid\Screens\AudioFiles;

use Orchid\Screen\Screen;

use App\Models\Audiofile;

use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;

use Orchid\Support\Color;

use App\Orchid\Layouts\AudioFiles\AudioFilesEditFields;

use Illuminate\Http\Request;

use Orchid\Screen\Fields\TextArea;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Storage;

class AudioFilesEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

     public $audio;

    public function query($id): iterable
    {
        return [
            "audio" => Audiofile::where('id',$id)->first()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Редактирование файла: '.$this->audio->name;
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
            $data['file'] = $this->audio->file;
        }



        $this->audio->fill($data)->save();

        Toast::info("Запись сохранена");
    }
}
