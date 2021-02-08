<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Auth;

use App\Models\Blog;
class BlogsRepository
{
    protected static $per_page_blogs = 9;

    public static function getAll($request){
         return Blog::orderBy('publication_date',$request->get('sort','desc'))->paginate(self::$per_page_blogs);
    }

    public static function getUserBlogs($request){
        return Blog::where('user_id',Auth::id())->orderBy('publication_date',$request->get('sort','desc'))->paginate(self::$per_page_blogs);
    }

    public static function save($request){
        $id = Auth::id();

        Blog::create([
        'title'=>$request['title'],
        'description'=>$request['description'],
        'publication_date'=>date('Y-m-d H:i:s'),
        'user_id'=>$id
        ]);
    }

    public static function getBlogDetail($id){
        return Blog::findOrFail($id);
    }
}
