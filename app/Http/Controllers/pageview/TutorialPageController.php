<?php

namespace App\Http\Controllers\pageview;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\Category;

class TutorialPageController extends Controller
{

	public function getCategoryitem(Request $req,$category_link){

		$category = new Category();
		$page = new Page();
		$cate = $category->where('link',$category_link)->first();
		if($cate != null){
			$items = $page->select('name','parent_name','link')
			->where('parent_name',$category_link)
			->where('publish',1)
			->get();
			$parent = $category->select('name')->where('link',$category_link)->first();
			return view('page.tutorial',['parent_name'=>$parent,'items'=>$items,'category_link'=>$category_link]);
		}
	}

    public function getItemContent(Request $req,$category_link,$item_link){

    	$category = new Category();
		$cate = $category->select('name','id')->where('link',$category_link)->first();
		if($cate != null){
			$ispage = $cate->page()->where('link',$item_link)->first();
			
			if($ispage != null){
				$page = $cate->page()
				->select('name','link')
				->where('parent_name',$category_link)
				->where('publish',1)
				->get();
				return view('page.tutorial',['parent_name'=>$cate,'items'=>$page,'page_content'=>$ispage,'category_link'=>$category_link]);
			}else{
				return redirect('/');
			} 

		}else{
			return redirect('/');
		}
    }
}
