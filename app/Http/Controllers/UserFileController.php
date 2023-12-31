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

        $uid = 0;
        if ($user) {
            $uid = $user->uid;
            $file_list = $user_files->handle($uid);
        }

        // dd($file_list);

        return view('user-file', [
            'search_do' => !empty($login),
            'user_accept' => !empty($user),
            'file_list' => $file_list,
            'uid'=>$uid,
            'user'=>$user,
        ]);
    }

}
