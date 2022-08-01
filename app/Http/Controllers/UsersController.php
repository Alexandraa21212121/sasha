<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getAllUsers()
    {

//        User::create([
//            'name' => 'Sasha',
//            'password' => 'password',
//            'email' => '234235@gmail.com'
//        ]);
//        $user = new User();
//        $user->name = 'Nikita';
//        $user->password = '52345';
//        $user->email = '43534@gmail.com';
//        $user->save();

//        $user = User::find(6);
////        $user->is_admin = true;
////        $user->update();
//
//        dd($user);
        return view('hui');
    }
}
