<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function index() {
        $user = auth()->user()->id;
        $todos = App::where('user_id', $user)->paginate(5);
        return view('apps.index', compact('todos', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'title' => 'required|max:255'
        ]);
            
        $currentTime = Carbon::now();
        $user = auth()->user()->id;

        $todo = new App([
            'title'          => $request->get('title'),
            'published_date' => $currentTime,
            'user_id'        => $user
        ]);
        $todo->save();

        return redirect('/apps')->with('success', 'Added New Todo!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\App  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo_edit = App::find($id);
        return view('apps.edit', compact('todo_edit')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\App  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
        ]);

        $todo_edit = App::find($id);
        $todo_edit->title = $request->get('title');
        $todo_edit->save();

        return redirect('/apps')->with('success', 'Data updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\App  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = App::find($id);
        $todo->delete();

        return redirect('/apps')->with('success', 'Todo item deleted!');
    }
}
