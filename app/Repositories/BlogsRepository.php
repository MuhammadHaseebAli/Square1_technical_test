<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
class BlogsRepository
{
    protected static $per_page_blogs = 9;

    public static function getAll($request){
         return Post::orderBy('publication_date',$request->get('sort','desc'))->paginate(self::$per_page_blogs);
    }

    public static function getUserBlogs($request){
        return Post::where('user_id',Auth::id())->orderBy('publication_date',$request->get('sort','desc'))->paginate(self::$per_page_blogs);
    }

    public static function save($request){
        $id = Auth::id();

        Post::create([
        'title'=>$request['title'],
        'description'=>$request['description'],
        'publication_date'=>date('Y-m-d H:i:s'),
        'user_id'=>$id
        ]);
    }

    public static function getBlogDetail($id){
        return Post::findOrFail($id);
    }

//     public static function pull_posts_other_platform(){
//         $url = 'https://sq1-api-test.herokuapp.com/posts';
//         $json = json_decode(file_get_contents($url), true);
//         foreach($json["data"] as $post){
//             Post::create([
//                 'title'=>$post['title'],
//                 'description'=>$post['description'],
//                 'publication_date'=>$post['publication_date'],
//                 'user_id'=>1
//             ]);
//         }
//     }
}
