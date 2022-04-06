<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderBy('updated_at', 'Desc')->get();
        return view('Blog.index')->with('post', $post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'title' => 'required|string',
            'message' => 'required|string',
            'cover_image' => 'image|max:4000',
        ]);

        if ($request->hasFile('cover_image'))
        {
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/images', $fileNameToStore);

        }else
        {
            $fileNameToStore = 'noimage.jpg';
        }

        $post = new Post();
        $post -> title = $request->input('title');
        $post -> message = $request->input('message');
        $post -> cover_image = $fileNameToStore;
        $post -> user_id = auth()->id();
        $post -> save();

        return redirect('/blog')->with('success', 'Your post was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::all();
        $post = Post::find($id);
        return  view('Blog.show')->with(['post'=> $post, 'comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if (Auth::user()->id == $post-> user_id)
        {
            return view('Blog.edit')->with('post', $post);
        }
        return redirect('/blog')->with('error', 'Unauthorised action detected');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'title' => 'required|string',
            'message' => 'required|string',
            'cover_image' => 'image|max:4000',
        ]);

        if ($request->hasFile('cover_image'))
        {
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/images', $fileNameToStore);

        }

        $post = Post::find($id);
        $post -> title = $request->input('title');
        $post -> message = $request->input('message');
        if ($request->hasFile('cover_image'))
        {
            $post -> cover_image = $fileNameToStore;
        }
        $post -> user_id = auth()->id();
        $post -> save();

        return redirect('/blog')->with('success', 'Your post was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return  redirect('/blog')->with('success', 'The post was successfully deleted');
    }
}
