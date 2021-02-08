<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BlogsRepository;

class DashboardController extends Controller
{
    public function index(Request $request){
        return view('dashboard')
        ->with('blogs', BlogsRepository::getUserBlogs($request))
        ->with('sort',$request->get('sort','desc'));
    }
}
