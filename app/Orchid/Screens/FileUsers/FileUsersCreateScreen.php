<?php

namespace App\Orchid\Screens\FileUsers;

use Orchid\Screen\Screen;

use App\Models\FileUser;

use Orchid\Support\Facades\Layout;

use App\Orchid\Layouts\FileUsers\FileUsersEditFields;


use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class FileUsersCreateScreen extends Screen
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
            FileUsersEditFields::class,
        ];
    }

    public function save_info(Request $request) {

        $request->validate([
            'fileuser.uid' => ['required', 'integer',  Rule::unique('file_users', 'uid')],
            'fileuser.name' => ['required', 'string']
        ]);


        $item = FileUser::create($request->get('fileuser'));

        return redirect()->route('platform.fileusers_edit', $item);
    }
}
