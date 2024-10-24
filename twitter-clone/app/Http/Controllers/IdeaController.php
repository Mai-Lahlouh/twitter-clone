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
        $idea = Idea::create([
            'content'=> request()->get('content',''),
        ]);
        $idea->save();
        return redirect()->route('dashboard')->with('success','Idea created successfully');
    }
    public function show(Idea $idea){
        return view('ideas.show',compact('idea'));
    }
    
    public function edit(Idea $idea){
        $editing = true;
        return view('ideas.show',compact('idea','editing'));
    }
    public function update(Idea $idea){
        request()->validate([
            'content'=>'required|min:3|max:250'
        ]);
        $idea->content = request()->get('content','');
        $idea->save();
        return view('ideas.show',compact('idea'))->with('success','Idea updated successfully');
    }
    public function destroy($id){
        Idea::where('id',$id)->firstOrFail()->delete();
        return redirect()->route('dashboard')->with('success','Idea deleted successfully');

    }
}
