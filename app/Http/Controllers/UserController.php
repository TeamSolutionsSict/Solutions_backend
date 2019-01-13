<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
     public function getListUser(){
           $user= User::selectRaw('tb_user.username,tb_user.phone, tb_user.id, tb_user.email, tb_user.avatar, tb_user.status, tb_user.level, count(tb_post.id) as num_post, count(tb_comment.id) as num_comment')
            ->leftjoin('tb_post','tb_user.username','tb_post.username')
            ->leftjoin('tb_comment','tb_comment.username','tb_user.username')
            ->groupBy('tb_user.username','tb_user.phone', 'tb_user.id', 'tb_user.email', 'tb_user.avatar', 'tb_user.status', 'tb_user.level')
            ->get()->toArray();
        return view('admin.list_user', compact('user'));
    }
     public function getDisableUser($id){
        $user = User::find($id)->first();
        $user->status = 0;
        $user->save();
        return redirect()->back();
    }
    public function getActiveUser($id){
        $user = User::find($id)->first();
        $user->status = 1;
        $user->save();
          // dd($user);
        return redirect()->back();
    }
}
