<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Session;

class ToDo extends Model
{
    use HasFactory;

    public static $todo,$image,$imageNewName,$directory,$imgUrl;

    public static function SaveTodo($request)
    {
        $validatedData = $request->validate([
            'todo_title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);
        self::$todo = new ToDo();

        self::$todo->todo_title = $validatedData['todo_title'];
        self::$todo->description = $validatedData['description'];
        self::$todo->date = $validatedData['date'];
        if ($request->file('image'))
        {
            self::$todo->image = self::getImgUrl($request);
        }

        $user = Session::get('userName');
        self::$todo->UserName = $user;
        self::$todo->save();
    }

    private static function getImgUrl($request)
    {
        self::$image = $request->file('image');
        if (self::$image)
        {
            if (self::$todo)
            {
                if (file_exists(self::$todo->image))
                {
                    unlink(self::$todo->image);
                }
            }
            self::$imageNewName = rand().'.'.self::$image->getClientOriginalExtension();
            self::$directory = 'adminAsset/image/';
            self::$imgUrl = self::$directory.self::$imageNewName;
            self::$image->move(self::$directory,self::$imageNewName);
        }
        else
        {
            self::$imgUrl = self::$todo->image;
        }

        return self::$imgUrl;
    }
    public static function updateTodo($request)
    {
        $validatedData = $request->validate([
            'todo_title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        self::$todo = ToDo::find($request->todo_id);

        self::$todo->todo_title = $validatedData['todo_title'];
        self::$todo->description = $validatedData['description'];
        self::$todo->date = $validatedData['date'];
        if ($request->file('image'))
        {
            self::$todo->image = self::getImgUrl($request);
        }

        $user = Session::get('userName');
        self::$todo->UserName = $user;
        self::$todo->save();
    }

}
