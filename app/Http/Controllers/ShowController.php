<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
// use Illuminate\Pagination\Paginator;


class ShowController extends Controller
{
    public function showAdminPost(){
        if(auth()->check()){
            // return view('homepage-feed',['posts' => auth()->user()->feedPosts()->latest()->get()]);
            // $posts=DB::table('Posts')->paginate(10);
            $posts=Post::all();
            $postCount=Post::count();
            $userCount=User::count();
            // return view('admin',['posts' => compact($posts)->latest()->get()->paginate(5)]); (Wrong approach)
            return view('admin',compact('posts','postCount','userCount'));
            // return view('admin',['posts' => $posts]);
        }else{
            if (Cache::has('postCount')) {
                $postCount = Cache::get('postCount');
            }else {
                sleep(5);
                $postCount = Post::count();
                Cache::put('postCount', $postCount, 20);
            }
            return view('homepage', ['postCount' => Post::count()]);
        }
    }
    public function showAdminUsers(){
        if(auth()->check()){
            // return view('homepage-feed',['posts' => auth()->user()->feedPosts()->latest()->get()]);
            // $posts=DB::table('Posts')->paginate(10);
            $posts=Post::all();
            $postCount=Post::count();
            $userCount=User::count();
            // return view('admin',['posts' => compact($posts)->latest()->get()->paginate(5)]); (Wrong approach)
            return view('admin',compact('posts','postCount','userCount'));
            // return view('admin',['posts' => $posts]);
        }else{
            if (Cache::has('postCount')) {
                $postCount = Cache::get('postCount');
            }else {
                sleep(5);
                $postCount = Post::count();
                Cache::put('postCount', $postCount, 20);
            }
            return view('homepage', ['postCount' => Post::count()]);
        }
    }
}
