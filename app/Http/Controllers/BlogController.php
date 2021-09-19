<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Reflector;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::orderBy('created_at', 'desc')
                        ->get();


        return view('blog.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'          =>  'required',
            'description'   =>  'required'
        ]);

       Blog::create([
            'title'         =>  $request->input('title'),
            'description'   =>  $request->input('description'),
            'slug'          =>  $slug = uniqid(). Str::slug($request->input('title'), '-'),
            'user_id'       =>  auth()->user()->id
       ]);

        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('blog.show')
            ->with('post', Blog::where('slug', $slug)->first())->with('name', 'Mosharaf Tanvir');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        
        if(auth()->user()->id !== $blog->user_id){
            return redirect('blog')->with('m', "You cannot edit other user post");
        }

        return view('blog.edit')
            ->with('post', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        Blog::where('slug', $slug)
            ->update([
                'title'         =>  $request->input('title'),
                'description'   =>  $request->input('description'),
                'slug'          =>  $slug = uniqid() . Str::slug($request->input('title'), '-'),
                'user_id'       =>  auth()->user()->id
            ]);
        
            return redirect('blog/'.$slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
       
        $post = Blog::where('slug', $slug)->first();

        if(auth()->user()->id !== $post->user_id){
            return redirect('blog')->with('m', "You cannot Delete other user post");
        }

        $post->delete();
        
        return redirect('blog/');
    }
}
