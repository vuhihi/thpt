<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\Category;
use Validator;
use App\Helpers;

class PageController extends Controller
{

	private $helpers;
    function __construct() {
        $this->helpers = new Helpers();
    }

    public function addPage( Request $req){

        $page = new Page();
        $page->name = $req->input('name');
        $page->title = $req->input('title');
        $page->parent_name = $req->input('parent');
        $page->main_content = $req->input('main_content');
        $page->link = $req->input('link');
        $page->fb_title = $req->input('fb_title');
        $page->fb_image = $req->input('fb_image');
        $page->fb_description = $req->input('fb_description');
        $page->google_keywords = $req->input('google_keywords');
        $page->google_description = $req->input('google_description');
        $page->parent_id = $req->input('parent_id');
        $page->publish = $req->input('publish');
        $page->created_at = date('Y-m-d H:i:s');
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:255|unique:page',
            'title' => 'required|string|max:255|unique:page',
            'link' => 'required|unique:page',
            'parent' => 'required',
            'main_content' => 'required|string',
            'fb_title' => 'required',
            'fb_image' => 'required',
            'fb_description' => 'required',
            'google_keywords' => 'required',
            'google_description' => 'required',
            'publish' => 'required',
            'parent_id' => 'required'
        ],
        $messages = [
                'required' => 'Không được để trống :attribute',
                'max' => 'Tên không quá 255 ký tự',
                'unique' => ':attribute đã tồn tại'
            ]);

        if ($validator->fails()) {
            return redirect('admin/add-page')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $is_saved = $page->save();
            $id = $page->select('id')
                            ->where('name',$page->name)->first();
                     
                $page->order = $id['id'];
            $page->save();
            if($is_saved){  
                session()->flash('msg', 'Thêm Page Thành Công!');
            }else{
                session()->flash('msg', 'Không thể thêm Page');  
            }
            return redirect()->back();
         }
        
    }
    public function setPageLink(Request $req){
        $url = '';
        $url = $this->helpers->set_url_path($req->name);  
        return $url;
        
    }

    public function setParentName(Request $req){
        $category = new Category();
        $url = 'no';
        $parent_link = $category->select('link')->where('id',$req->id)->first();
        $url = $parent_link['link'];
        return $url;

    }
}
