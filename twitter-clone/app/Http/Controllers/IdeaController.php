<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(){
        $validated= request()->validate([
            'content'=>'required|min:3|max:250'
        ]);
        $validated['user_id'] = auth()->id();
        Idea::create($validated);
        return redirect()->route('dashboard')->with('success','Idea created successfully');
    }
    public function show(Idea $idea){
        return view('ideas.show',compact('idea'));
    }
    public function edit(Idea $idea){
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }
        $editing = true;
        return view('ideas.show',compact('idea','editing'));
    }
    public function update(Idea $idea){
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }
        request()->validate([
            'content'=>'required|min:3|max:250'
        ]);
        $idea->content = request()->get('content','');
        $idea->save();
        return view('ideas.show',compact('idea'))->with('success','Idea updated successfully');
    }
    public function destroy(Idea $idea){
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }
        /*
        if(auth()->id() !== $id->user_id){
            abort(404);
        }
         */
        //Idea::where('id',$id)->firstOrFail()->delete();
        $idea->delete();
        return redirect()->route('dashboard')->with('success','Idea deleted successfully');

    }
}
