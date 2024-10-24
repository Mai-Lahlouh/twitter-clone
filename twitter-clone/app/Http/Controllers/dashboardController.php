<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class dashboardController extends Controller
{

    public function index(){
        $idea = Idea::orderBy('created_at','DESC');
        if(request()->has('search')){
           $idea=  $idea->where('content','like','%' . request()->get('search') . '%');
        }
        return view('dashboard',['ideas'=>$idea->paginate(5)]);
    }
}
