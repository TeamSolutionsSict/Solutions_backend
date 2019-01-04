<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KeywordModel;
use App\PostModel;
use App\User;
class AdminController extends Controller
{
    public function getDashboard(){

        return view('admin.index');
    }
// Phần quản lý user
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
        // dd($user);
        return redirect()->back();
    }
    public function getActiveUser($id){
        $user = User::find($id)->first();
        $user->status = 1;
        $user->save();
          // dd($user);
        return redirect()->back();
    }
// Phần quản lý post
     public function getListPost(){
        $post= PostModel::selectRaw('tb_post.id,tb_post.title, tb_post.content, tb_user.username,tb_post.view,tb_post.votes, tb_post.status,tb_post.timepost, count(tb_comment.id) as num_comment')
            ->join('tb_user','tb_user.username','tb_post.username')
            ->leftjoin('tb_comment','tb_comment.id_post','tb_post.id')
            ->groupBy('tb_post.id','tb_post.title', 'tb_post.content','tb_user.username','tb_post.view','tb_post.votes','tb_post.status','tb_post.timepost')
            ->get()->toArray();
        return view('admin.list_post',compact('post'));
    }
     public function getDisablePost($id){
        $post = PostModel::find($id)->first();
        $post->status = 0;
        $post->save();
        return redirect()->back();
    }

    public function getActivePost($id){
        $post = PostModel::find($id)->first();
        $post->status = 1;
        $post->save();
        return redirect()->back();
    }

    public function getDeletePost($id){
        $post = PostModel::find($id)->first();
        $post->delete();
        return redirect()->back();
    }

// Phần quản lý Keyword
    public function getListKeyWord(){
        $keyword = KeywordModel::orderBy('id','asc')->get()->toArray();
        return view('admin.list_keyword',compact('keyword'));
    }

    public function getDisableKeyWord($id){
        $keyword = KeywordModel::find($id)->first();
        $keyword->keyword = $keyword->keyword;
        $keyword->status = 0;
        $keyword->save();
        return redirect()->back();
    }

    public function getActiveKeyWord($id){
        $keyword = KeywordModel::find($id)->first();
        $keyword->keyword = $keyword->keyword;
        $keyword->status = 1;
        $keyword->save();
        return redirect()->back();
    }

    public function getDeleteKeyWord($id){
        $keyword = KeywordModel::find($id)->first();
        $keyword->delete();
        return redirect()->back();
    }
}
