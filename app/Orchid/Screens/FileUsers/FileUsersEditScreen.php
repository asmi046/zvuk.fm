<?php

namespace App\Orchid\Screens\FileUsers;

use Orchid\Screen\Screen;

use App\Models\FileUser;

use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;

use Orchid\Support\Color;

use App\Orchid\Layouts\FileUsers\FileUsersEditFields;

use Illuminate\Http\Request;

use Orchid\Screen\Fields\TextArea;

use Illuminate\Validation\Rule;

class FileUsersEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

     public $fileuser;

    public function query($id): iterable
    {
        return [
            "fileuser" => FileUser::where('id',$id)->first()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Редактирование пользователя скачивающего файлы: '.$this->fileuser->name;
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

            FileUsersEditFields::class,
        ];
    }

    public function save_info(Request $request) {

        $request->validate([
            'fileuser.uid' => ['required', 'integer',  Rule::unique('file_users', 'uid')->ignore($this->fileuser->id)],
            'fileuser.name' => ['required', 'string']
        ]);



        $this->fileuser->fill($request->get('fileuser'))->save();

        Toast::info("Запись сохранена");
    }
}
