<?php

namespace App\Http\Controllers;

use App\Models\blogpost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
class BlogPostController extends Controller
{
    /**
     * @return view
     */
    public function blog(){
        $post=blogpost::all();
        return view('blog.welcome',[
            'posts' =>$post,
        ]);
    }
    
    public function show($slug){
        $blogPost = (new blogpost())->getPost($slug);
        // dd($blogPost);
        return view('blog.Show',[
            'post'=>$blogPost,
        ]);
    }

    /**
     * Create a new blog
     * @return view 
     */
    public function create(){
        return view('blog.create');
    }

    /***
     * 
     * Store the blogs
     */
    public function store(Request $request)
    {
        
        $request['slug'] = Str::slug($request['slug']);
        // dd($request->all());
        $this->validate($request, [
            'title' => 'required|min:2',
            'slug' => 'required|unique:blog_posts,slug',
            'body'  => 'required',
        ]);

        $user=Auth::user();
        $newPost = blogpost::create([
            'title' => $request->title,
            'slug'=>$request->slug,
            'body' => $request->body,
            'user_id' => $user->id,
        ]);

        return redirect('blog/' . $newPost->slug)->with('message','Blog has been created');
    }


    /**
     * @return allEditableBlogs 
     * editable show blogs
     * 
     */

    public function editblog(Request $request){
        
        if(Auth::check()){
            $user=Auth::user();
            $data = blogpost::all();
           
            
            if ($request->ajax()) {
                  // $data = User::select('*');
                return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
         
                               $btn = '<a href="edit/'.$row->slug.'" class="btn btn-outline-primary btn-sm" title="edit"><i class="fas fa-edit"></i></a>';
                               $btn .='  <a href="delete/'.$row->slug.'" class="delete btn btn-sm btn-outline-danger" title="delete"><i class="fas fa-trash-alt"></i></a>';
                               $btn .='  <a href="blog/'.$row->slug.'" class="btn btn-sm btn-outline-primary" title="view"><i class="fa fa-eye" aria-hidden="true"></i></a>';

                               return $btn;
                        })
                        ->rawColumns(['delete','action'])
                        ->make(true);
                        
            }
            return view('blog.userBlog',[
                
                'users' => $user,
                'blogs' => $data,
            
            ]);
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    
    /**
     * @return singleEdit
     * edit the Selected blog
     * 
     */
    public function edit($slug){
        $user = Auth::user();
        
        $post = (new blogpost)->getEditPost($user->id,$slug);
        return view('blog.edit')->with([
            'post' => $post,
            'id' => $slug,
        ]);
    }

    public function update(Request $request,$slug){
        $user = Auth::user();
        $post = (new BlogPost)->getEditPost($user->id, $slug);
        $request['slug'] = Str::slug($request['slug']);
        $this->validate($request, [
            'title' => 'required|min:2',
            'slug' => 'required|unique:blog_posts,slug',
            'body'  => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'body'  => $request->body,
        ]);
        return redirect('blog/'.$post->slug)->with('message','Blog has been updated');
    }

    public function destroy($slug){

        $user = Auth::user();
        $post = (new blogpost)->getEditPost($user->id, $slug);
        $post->delete();
        return redirect()->back()->with('success','Post has been deleted');
    }
    
}
