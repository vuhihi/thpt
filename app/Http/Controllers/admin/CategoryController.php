<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Validator;
use App\Helpers;

class CategoryController extends Controller
{
    private $category;
	private $helpers;
    public function __construct() {
        $this->helpers = new Helpers();
        $this->category = new Category();
    }

    public function getParent(){

        $data =  $this->category->select('name','id')->get();

        return json_encode($data);
    }

    public function addCategory(Request $req){
        $this->category->name = $req->input('name');
        $this->category->created_at = date('Y-m-d H:i:s');
        $this->category->link = $req->input('link');
        $this->category->fb_title = $req->input('fb_title');
        $this->category->fb_image = $req->input('fb_image');
        $this->category->fb_description = $req->input('fb_description');
        $this->category->google_keywords = $req->input('google_keywords');
        $this->category->google_description = $req->input('google_description');
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:255|unique:category',
            'link' => 'required',
            'fb_title' => 'required',
            'fb_image' => 'required',
            'fb_description' => 'required',
            'google_keywords' => 'required',
            'google_description' => 'required'
        ],
            $messages = [
                'required' => 'Không được để trống :attribute',
                'max' => 'Tên không quá 255 ký tự',
                'unique' => ':attribute đã tồn tại'
            ]
        );
        if ($validator->fails()) {
            return back()->withInput()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $is_saved = $this->category->save();
            $id = $this->category->select('id')
                            ->where('name',$this->category->name)->first();
                     
                $this->category->order = $id['id'];
            $this->category->save();
            if($is_saved){  
                session()->flash('msg', 'Thêm Chủ Đề Thành Công!');
            }else{
                session()->flash('msg', 'Không thể thêm Chủ Đề');  
            }
            return redirect()->back();
         }
    }

    public function setCategoryLink(Request $req){
        $name = $req->name;
        $link = $this->helpers->set_url_path($name);
        return $link;
    }

    public function editCategory(Request $req, $id){
        $cate = $this->category->where('id',$id)->first();
        if($cate !== null){
            return view('admin.edit_category');
        }else{
            return view('admin.edit_category');
        }

    }

    public function selectCategory(Request $req){
        $cates = $this->category->orderBy('id', 'desc')->select('id','name','fb_image')->paginate(4);
        return view('admin/select_category',['cates'=>$cates]);
    }
}
