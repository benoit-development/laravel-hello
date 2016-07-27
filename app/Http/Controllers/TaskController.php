<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the task hompage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
    
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }
    
    
    /**
     * Add a task
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        ]);
        
        if ($validator->fails()) {
        return redirect('/task')
            ->withInput()
            ->withErrors($validator);
        }
        
        $task = new Task;
        $task->name = $request->name;
        $task->save();
        
        return redirect('/task');
        
    }
    
    
    /**
     * Delete a task
     * 
     * @param Task $task
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function delete(Task $task) {
        $task->delete();
        return redirect('/task');
    }
    
}
