<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\KeywordModel;
use App\PostModel;
use App\PostKeyModel;
class AdminController extends Controller
{
    public function getDashboard(){
        return view('admin.index');
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