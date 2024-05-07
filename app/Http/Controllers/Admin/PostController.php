<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user','categories')->paginate(8);

        return view('admin.post.index',compact('posts'));
    }
    //function to display form
    public function create()
    {
        $categories = Category::all()->pluck('name','id');
        return view('admin.post.create',compact('categories'));
    }

    public function store(Request $request)
    {
        //validate
        $request->validate([
           'title'=> 'required',
           'categories'=> 'required|array',  // Add validation for categories
           'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000', // adjust max file size as needed
        ]);


        $post = new Post;
        $post->title = $request->title;
        $post->post_content = $request->post_content;

        if($request->file('image'))
        {
            $file = $request->file('image');
            @unlink(public_path('upload/post_images/'.$post->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/post_images'),$filename);
            $post['image'] = $filename;
        }

         // Link the authenticated user to the post
        $post->user_id = Auth::id(); // Assuming the authenticated user is an admin

        $post->save();
        $post->categories()->sync($request->input('categories', []));
        $notification = array(
            'message' => 'blog post created successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('admin.post.index')->with($notification);
    }

    public function show($id)
    {
        $post = Post::find($id);
        $posts = Post::all();
        return view('admin.post.show',compact('post','posts'));
    }

}
