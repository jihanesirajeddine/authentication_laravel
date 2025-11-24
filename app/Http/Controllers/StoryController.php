<?php

namespace App\Http\Controllers;
use App\Models\Story;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        $allStories = Story::all();
        return view('stories.index',['stories'=>$allStories]);
    }

    public function create()
    {
        return view('stories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required|string',
            'text'=>'required|string',
        ]);

        $validated['user_id'] = Auth::id();

        Story::create($validated);

        return redirect()->route('stories.show')->with( 'success', 'Story created!');
    }

    public function edit($StoryId)
    {
        $singleStory = Story::find(id: $StoryId);
        return view('stories.edit',['story'=>$singleStory]);
    }

    public function update(Request $request, $StoryId)
    {
        $singleStory = Story::find($StoryId);

        $validated = $request->validate([
            'title'=> 'required',
            'text'=>'required',
        ]);

        $singleStory->update($validated);


        return redirect()->route('stories.show')->with( 'success', 'Story updated!');
    }

    public function show()
    {
        $userId = Auth::id();
        $mystories = Story::where( 'user_id',$userId)->get();

        return view('stories.show',['mystories'=>$mystories]);
    }
    
    public function destroy($StoryId)
    {
        $singleStory = Story::find($StoryId);
        $singleStory->delete();

        return redirect()->route('stories.show')->with('success','Story deleted!');
    }

}
