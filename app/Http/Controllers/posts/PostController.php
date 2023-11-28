<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all()->take(2);
        $postsOne = Post::take(1)->orderby('id', 'DESC')->get();
        $postsTwo = Post::take(2)->orderby('title', 'DESC')->get();

        //Business Posts
        $postBusiness = Post::where('category', 'Business')->orderby('id', 'desc')->take(2)->get();
        $postBus = Post::where('category', 'Business')->orderby('title', 'desc')->take(3)->get();

        //Random Posts
        $RandomPosts = Post::take(4)->orderby('id')->get();

        //Culture Posts
        $CulturePosts = Post::where('category', 'Culture')->orderby('id', 'desc')->take(2)->get();
        $CulturePostsThree = Post::where('category', 'Culture')->orderby('id')->take(3)->get();

        //POLITICS Posts
        $PoliticsPosts = Post::where('category', 'Politics')->orderby('id', 'desc')->take(6)->get();

        //Travel Posts
        $TravelPosts = Post::where('category', 'Travel')->orderby('id',)->take(1)->get();
        $TravelPostsOne = Post::where('category', 'Travel')->orderby('id', 'desc')->take(1)->get();
        $TravelPostsTwo = Post::where('category', 'Travel')->orderby('title', 'desc')->take(2)->get();


        return view('posts.index', compact('posts', 'postsOne', 'postsTwo', 'postBusiness', 'postBus', 'RandomPosts', 'CulturePosts', 'CulturePostsThree', 'PoliticsPosts', 'TravelPosts', 'TravelPostsOne', 'TravelPostsTwo'));
    }

    public function single($id)
    {

        $single = Post::query()->findOrFail($id);
        $postpop = Post::take(3)->orderBy('id', 'DESC')->get();
        $categories = DB::table('categories')
            ->join('posts', 'posts.category', '=', 'categories.name')
            ->select('categories.name AS name', 'categories.id AS id', DB::raw('COUNT(posts.category)AS total'))
            ->groupBy('posts.category')
            ->get();

        $comments = Comment::where('posts_id', $id)->get();
        $commentNum = $comments->count();

        $moreBlogs = Post::where('category', $single->category)->where('id', '!=', $id)->take(4)->orderby('id', 'DESC')->get();
        return view('posts.single', compact('single', 'postpop', 'categories', 'comments', 'moreBlogs', 'commentNum'));

    }

    public function StoreComment(Request $request)
    {

        $insert = Comment::create([
            'comment' => $request->comment,
            'user_id' => Auth::user()->id,
            "posts_id" => $request->posts_id
        ]);
        return redirect()->back()->with('success', 'your message,here');
    }

    public function create()
    {

        if(auth()->user()) {
            $categories = Category::all();
            return view('posts.create', compact('categories'));
        }
        else
            return redirect('login');


    }

    public function store(Request $request)
    {

        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

        $insertpost = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'user_id' => Auth::user()->id,
            'image' => $myimage
        ]);
        return redirect()->back()->with('success', 'creat posts successfully');
    }

    public function delete($id)
    {

        $delete = Post::query()->findOrFail($id)->delete();

        return redirect('posts/index')->with('delete', 'Delete posts successfully');
    }

    public function edit($id)
    {
        $single = Post::query()->findOrFail($id);
        $categories = Category::all();
        if(auth()->user()->id ==$single->id) {
            return view('posts.edit', compact('single', 'categories'));
        }
        else
            return abort('404');
    }
    public function update(Request $request ,$id){
        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

        $update=Post::query()->findOrFail($id);
      $update->update($request->all());
        $update->save();
        return redirect('posts/'.$id.'/single')->with('edit', 'Edit posts successfully');

    }

}

