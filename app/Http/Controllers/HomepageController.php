<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BlogsRepository;

class HomepageController extends Controller
{
    public function index(Request $request){
        return view('homepage')
        ->with('blogs', BlogsRepository::getAll($request))
        ->with('sort',$request->get('sort','desc'));

    }
}
