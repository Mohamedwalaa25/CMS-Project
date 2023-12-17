<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserProdileController extends Controller
{
    public function edit($id){
        $user=User::query()->findOrFail($id);

        return view('user.edit',compact('user'));
    }
    public function update(Request $request ,$id){
        $user = User::query()->findOrFail($id);
        Request()->validate([
            'name'=>'required',
            'email'=>'required,unique:users',
            'bio'=>'required',
        ]);
        $user->update($request->all());
        return redirect()->route('post.index');
    }
public  function profile($id){
        $profile = User::query()->findOrFail($id);
        $postprofile= Post::query()->where('user_id',$id)->take(4)->orderBy('created_at','Desc')->get();
        return view('user.profile' ,compact('profile','postprofile'));

}

}
