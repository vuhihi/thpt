<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Page;
use Validator;
use App\Helpers;


class AdminController extends Controller
{
    private $helpers;
    function __construct() {
        $this->helpers = new Helpers();
    }
    public function addCategory(Request $req){
        $category = new Category();
        $category->name = $req->input('name');
        $category->created_at = date('Y-m-d H:i:s');
        $category->link = $this->helpers->set_url_path($category->name);
        $category->fb_url = $req->input('fb_url');
        $category->fb_title = $req->input('fb_title');
        $category->fb_image = $req->input('fb_image');
        $category->fb_description = $req->input('fb_description');
        $category->google_keywords = $req->input('google_keywords');
        $category->google_description = $req->input('google_description');
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:255|unique:category',
            'fb_url' => 'required',
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
            $is_saved = $category->save();
            $id = $category->select('id')
                            ->where('name',$category->name)->first();
                     
                $category->order = $id['id'];
            $category->save();
            if($is_saved){  
                session()->flash('msg', 'Thêm Chủ Đề Thành Công!');
            }else{
                session()->flash('msg', 'Không thể thêm Chủ Đề');  
            }
            return redirect()->back();
         }
    }

    public function addPage( Request $req){

        $page = new Page();
        $page->name = $req->input('name');
        $page->title = $req->input('title');
        $page->main_content = $req->input('main_content');
        $page->link = $this->helpers->set_url_path($page->name);
        $page->fb_url = $page->link;
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
            'main_content' => 'required|string',
            'fb_url' => 'required',
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

    public function getSubject(){

        $subject = new Category();
        $data =  $subject->select('name','id')->get();

        return json_encode($data);
    }

    public function getHost(){
        return url();
    }
}
