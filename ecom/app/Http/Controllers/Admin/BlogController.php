<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function Index()
    {

        $blogs =Blog::latest()->paginate(10);
        return view('admin.allblog', compact('blogs'));
    }

    public function SearchBlog(Request $request)
    {
        $searchQuery = $request->input('q');
        $blogs = Blog::where('blogTitle', 'like', '%' . $searchQuery . '%')->paginate(10);

        return view('admin.allblog', compact('blogs'));
    }

    public function AddBlog()
    {
        return view('admin.addblog');
    }
    public function StoreBlog(Request $request)
    {
        //     $request->validate([
        //        'blogTitle' => 'required|unique:blogs'
        //   ]);
        $validator = Validator::make($request->all(), [
            'blogTitle' => 'required|unique:blogs'
        ]);

        Blog::insert([
            'blogTitle' => $request->blogTitle,
         //   'blogslug' => strtolower(str_replace(' ', '-', $request->blogTitle)),
            'blogIntro' => $request->blogIntro,
            'blogContent' => $request->blogContent,
            'blogCreatedDate' => now('Asia/Ho_Chi_Minh'),
        ]);

        return redirect()->route('allblog')->with('message', 'Thêm blog thành công');



        if ($validator->passes()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            return response()->json([
                'status' => true,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function EditBlog($blogID)
    {
        $blog_info = blog::findOrFail($blogID);
        return view('admin.editblog', compact('blog_info'));
    }
    public function UpdateBlog(Request $request)
    {
        $blogID = $request->blogID;

        $request->validate([
            'blogTitle' => 'required|unique:blogs,blogTitle,' . $blogID . ',blogID'
        ]);

        blog::findOrFail($blogID)->update([
            'blogTitle' => $request->blogTitle,
         //   'blogslug' => strtolower(str_replace(' ', '-', $request->blogTitle)),
            'blogIntro' => $request->blogIntro,
            'blogContent' => $request->blogContent,
            'blogModifiedDate' => now('Asia/Ho_Chi_Minh'),
        ]);

        return redirect()->route('allblog')->with('message', 'Cập nhật blog thành công');
    }

    public function DeleteBlog($blogID)
    {
        $blog = blog::findOrFail($blogID);
        $blog->delete();

        return redirect()->route('allblog')->with('message', 'Đã thực hiện thành công');;
    }
}

