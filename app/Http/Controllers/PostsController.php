<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Post;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Pagination\Paginator;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id'); 

        $num = auth()->user()->following()->count();

        $gjej = Profile::all()->random()->user_id;

        $gjej2 = Profile::all()->random()->user_id;
        
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('posts.index', compact('posts','num','gjej','gjej2'));
    }

    public function boot()
    {
        Paginator::useBootstrap();
    }

    public function create(){
        return view('posts.create');
    }
    
    public function store(){
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('uploads','public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post){
        return view('posts.show', compact('post'));
    }

}
