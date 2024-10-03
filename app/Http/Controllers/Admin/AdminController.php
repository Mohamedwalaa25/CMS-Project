<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Testing\Fluent\Concerns\Has;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function checklogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth('admin')::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('admin/Dashboard');
        }

        return redirect('admin/login')
            ->withErrors(['email' => 'Invalid credentials'])
            ->withInput();
    }
    //comment 4


    public function index()
    {
        $post = Post::all()->count();
        $category = Category::all()->count();
        $admin = Admin::all()->count();
        return view('admin.dashboard', compact('post', 'category', 'admin'));
    }

    public function admin()
    {
        $admins = Admin::all();
        return view('admin.admin', compact('admins'));
    }

    public function create()
    {
        return redirect('admin/create-admin')->with('Success', 'Admin Created New Admin Successfully');
    }

    public function store(Request $request)
    {
        Request()->validate([
            'name' => 'required|max:20|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        $insertAdmin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('admin/Admin/List')->with('success', 'New Admin Created Successfully');
    }

    public function Categories()
    {
        $categories = Category::all();
        return view('admin.Category.index', compact('categories'));
    }

    public function createCategory()
    {
        return view('Admin.category.create');
    }

    public function storeCategory(Request $request)
    {

        Request()->validate([
            'name' => 'required|string'
        ]);
        $insertCategory = Category::create([
            'name' => $request->name
        ]);
        return redirect('admin/Show-Categories')->with('Success', 'Admin Created Category Successfully');
    }


    public function editCategory($id)
    {
        $category = Category::query()->find($id);
        return view('Admin.category.edit', compact('category'));

    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::query()->findOrFail($id);
        Request()->validate([
            'name' => 'required|string'
        ]);
        $category->update($request->all());
        return redirect('admin/Show-Categories')->with('update', 'Admin Updated Category Successfully');

    }
    public function deleteCategory($id)
    {
        $category = Category::query()->findOrFail($id);
        $category->delete();
        return redirect('admin/Show-Categories')->with('delete', 'Admin Deleted Category Successfully');

    }

    public function AllPosts()
    {

        $posts = Post::paginate(20);
        return view('Admin.Post.index', compact('posts'));
    }
    public function deletePost($id)
    {
        $posts = Post::query()->findOrFail($id);

        $file_path=public_path('asset/images/'.$posts->image);
        unlink($file_path);
        $posts->delete();
        //comment 6
        return redirect('admin/posts/index')->with('delete', 'Admin Deleted Post Successfully');

    }


            //comment 7

            //final commit
            

            //one more

}
