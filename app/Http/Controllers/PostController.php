<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KeywordModel;
use App\PostModel;
use App\PostKeyModel;
use App\CommentModel;
use DateTime;

class PostController extends Controller
{
    
    // Phần quản lý post
     public function getListPost(){
        $post= PostModel::selectRaw('tb_post.id,tb_post.title, tb_post.content, tb_user.username,tb_post.view,tb_post.votes, tb_post.status,tb_post.timepost, count(tb_comment.id) as num_comment')
            ->join('tb_user','tb_user.username','tb_post.username')
            ->leftjoin('tb_comment','tb_comment.id_post','tb_post.id')
            ->groupBy('tb_post.id','tb_post.title', 'tb_post.content','tb_user.username','tb_post.view','tb_post.votes','tb_post.status','tb_post.timepost')
            ->get()->toArray();
        foreach ($post as $key=>$value) {
           $allKey=PostkeyModel::select('*')->where('id_post',$value['id'])->get()->toArray();
            $post[$key]['keyWordName']= array();
            foreach ($allKey as $val) {
                $keyname=KeywordModel::find($val['id_keyword']);
             
                $post[$key]['keyWordName'][]=$keyname->keyword;
             }
        }
        return view('admin.list_post',compact('post'));
    }
     public function getQuestionDetails($id){
        $post=PostModel::select('*')
            ->join('tb_user', 'tb_user.username', '=', 'tb_post.username')
            ->where('tb_post.id',$id)->get()->toArray();   
        $now = new DateTime(date('Y-m-d H:i:s'));
        $ref = new DateTime($post[0]['timepost']);
        $diff = $now->diff($ref);
        // printf('%d days, %d hours, %d minutes', $diff->d, $diff->h, $diff->i);
        $post[0]['timepost']=$diff->d." days, ".$diff->h." hours ".$diff->i." minutes ago";

         $allKey=PostkeyModel::select('*')->where('id_post',$id)->get()->toArray();
        $post[0]['keyWordName']= array();
            foreach ($allKey as $val) {
                $keyname=KeywordModel::find($val['id_keyword']);
             
                $post[0]['keyWordName'][]=$keyname->keyword;
            }
        $comment=CommentModel::select('tb_comment.*','tb_user.avatar')
                        ->join('tb_user', 'tb_user.username', '=', 'tb_comment.username')
                        ->where('tb_comment.id_post',$id)
                        ->get()
                        ->toArray();
        foreach ($comment as $key=>$value) {
         // $now = new DateTime(date('Y-m-d H:i:s'));
             $ref = new DateTime($value['time_cmt']);
             $diff = $now->diff($ref);
        $comment[$key]['time_cmt']=$diff->d." days, ".$diff->h." hours ".$diff->i." minutes ago";
        }
        return view('page.question_details', compact('post','comment'));
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
}
