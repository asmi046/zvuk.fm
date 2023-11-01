<?php

namespace App\Http\Controllers;

use App\Models\FileUser;

use Illuminate\Http\Request;

use App\Actions\GetUserFilesAction;

class UserFileController extends Controller
{
    public function index(GetUserFilesAction $user_files, Request $request) {
        $request->flash();
        $login = $request->input('login');
        $user = FileUser::where('name', $login)->first();

        $file_list = [];

        if ($user) {
            $uid = $user->uid;
            $file_list = $user_files->handle($uid);

        }

        return view('user-file', [
            'search_do' => !empty($login),
            'user_accept' => !empty($user),
            'file_list' => $file_list
        ]);
    }

}
