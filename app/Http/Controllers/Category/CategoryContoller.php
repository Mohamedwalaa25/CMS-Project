<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryContoller extends Controller
{
    public function categories($name){
        $posts=Post::query()->where('category',$name)->take(5)->orderBy('created_at',)->get();
        $postssidebar=Post::query()->where('category',$name)->take(3)->orderBy('created_at','DESC')->get();
        $categories = DB::table('categories')
            ->join('posts', 'posts.category', '=', 'categories.name')
            ->select('categories.name AS name', 'categories.id AS id', DB::raw('COUNT(posts.category)AS total'))
            ->groupBy('posts.category')
            ->get();


        return view('categories.category',compact('posts','postssidebar','categories','name'));

    }
}
