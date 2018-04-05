<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class HomeController extends Controller
{
   
    public function index(){
        $category = new Category();
        $items = $category->select('name','link')->get();
        return view('page.index',['items'=>$items]);
    }
}
