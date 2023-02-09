<?php

namespace App\Http\Controllers;
use App\Models\ToDo;
use Session;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('admin.home.home',[
            'todos'=> ToDo::all(),
            'usertodos' => ToDo::where('UserName',Session::get('userName'))->get(),
        ]);
    }
    public function todo()
    {
        return view('admin.todo.add-todo');
    }
    public function SaveTodo(Request $request)
    {
        ToDo::SaveTodo($request);
        return back();
    }
    public function manageTodo()
    {
        return view('admin.todo.manage-todo',[
            'todos'=> ToDo::all(),
            'usertodos' => ToDo::where('UserName',Session::get('userName'))->get(),
        ]);
    }
    public function edittodo($id)
    {
        $edit_todo = ToDo::find($id);
        return view('admin.todo.edit-todo',[
            'todo'=> $edit_todo,
        ]);
    }
    public function updateTodo(Request $request)
    {
        ToDo::updateTodo($request);
        return redirect(route('home'))->with('message','Update Successfully');
    }

    public function deletetodo(Request $request)
    {
        $todo = ToDo::find($request->todo_id);
        if ($todo->image)
        {
            if (file_exists($todo->image))
            {
                unlink($todo->image);
            }
        }
        $todo->delete();
        return back();
    }
}
