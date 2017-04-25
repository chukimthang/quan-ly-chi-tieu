<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RemoteImageUploader\Factory;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use App\User;
use Auth;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = User::find(Auth::user()->id);

        return view('user.showProfile', compact('user'));
    }

    public function getEditProfile()
    {
        $user = User::find(Auth::user()->id);

        return view('user.editProfile', compact('user'));
    }

    public function postUpdateAvatar(Request $request)
    {
        try {
            $result = Factory::create(config('uploadphoto.host'), config('uploadphoto.auth'))
                ->upload($request->upload->path());

            return [
                'status' => true,
                'url' => $result,
                'message' => 'Upload successfull!',
            ];
        } catch (\Exception $ex) {

            return [
                'status' => false,
                'url' => '',
                'message' => 'Upload fail! ' . $ex->getMessage(),
            ];
        }
    }

    public function postUpdateProfile(UserRequest $request)
    {
        $id = $request->id;
        if ($id) {
            $data = $request->only('name', 'password', 'avatar');
            if ($data['password'] == '') {
                unset($data['password']);
            } else {
                $data['password'] = bcrypt($data['password']);
            }
            if ($data['avatar'] == '') {
                unset($data['avatar']);
            }
            $user = User::find($id);
            $user->update($data);

            return response()->json(['status' => 200]);
        }
    }
}
