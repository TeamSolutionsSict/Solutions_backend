<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeyWordController extends Controller
{
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
        //Hash id post hihi
        // $date = new Datetime();

        // $idPost = $date->format('d-m-Y').'1'.'nqcuong';
        // Date+index+admin
        // dd(Hash::make($idPost));

        //Hiển thị keyword lên table sắp xếp theo thứ tự id
        $keyword = KeywordModel::orderBy('id','asc')->get()->toArray();
        // Đếm số lượng bài post có chứa keyword
        //Cho 1 biến đếm dạng mảng(vì có nhiều keyword nên đưa vào mảng)
        $countPost = array();
        //Chạy vòng lặp để join tb_keyword với tb_postkey và push vào mảng
        //Mảng push vào dạng keyword : số lần post để truyền qua view không sợ nhầm lẫn
        foreach ($keyword as $value) {
            $countPost[$value['keyword']] = KeywordModel::join('tb_postkey','tb_postkey.id_keyword','=','tb_keyword.id')
                                    ->where('tb_keyword.id','=',$value['id'])->count();
        }
        //Được kết quả cuối cùng và compact vào view
        return view('admin.list_keyword',compact('keyword','countPost'));
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
}
