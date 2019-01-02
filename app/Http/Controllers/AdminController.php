<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getDashboard(){
        return view('admin.index');
    }
    public function getListUser(){
        return view('admin.list_user');
    }
     public function getListPost(){
        return view('admin.list_post');
    }
}
