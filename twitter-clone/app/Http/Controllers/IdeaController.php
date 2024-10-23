<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(){
        request()->validate([
            'content'=>'required|min:3|max:250'
        ]);
        $idea = new Idea([
            'content'=> request()->get('content',''),
            'likes'=>1
        ]);
        $idea->save();
        return redirect()->route('dashboard')->with('success','Idea created successfully');
    }
}
