<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BlogsRepository;
use App\Http\Requests\CreatePostRequest;

class BlogsController extends Controller
{
       public function create(){
           return view('blog.create');
       }

       public function save(CreatePostRequest $request){
           BlogsRepository::save($request->all());
           return redirect('/dashboard');
       }

       public function view(Request $request){
           return view('blog.view')->with('blog', BlogsRepository::getBlogDetail($request->id));
       }
}
