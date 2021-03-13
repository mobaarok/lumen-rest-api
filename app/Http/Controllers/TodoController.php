<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;    
    }

    public function getAll()
    {
        $todos = app('db')->select("SELECT * FROM todos");
        return response()->json([
            "messege" => "todo get successfully.",
            "code" => 200,
            "todos" => $todos,
        ]);
    }

    public function show($id)
    {
        $todo = app('db')->select('SELECT * FROM todos WHERE id = ?', [$id]);
        return response()->json([
            "messege" => "todo get successfully.",
            "code" => 200,
            "todo" => $todo,
        ]);
    }

    public function create()
    {
        $todo = $this->request->todo;
        $is_complete = $this->request->is_complete;
        $todo = app('db')->insert(
            'insert into todos (todos, is_complete) values (?, ?)',
            [$todo, $is_complete]
        );
        if ($todo) {
            return response()->json([
                "messege" => "todo created successfully.",
                "code" => 201,
            ]);
        }
    }

    public function update($id)
    {
        $todos = $this->request->todos;
        $is_complete = $this->request->is_complete;
        $todo = app('db')->update(
            "UPDATE todos SET todos = '$todos', is_complete =  '$is_complete' WHERE id = ?",
            [$id]
        );
        if ($todo) {
            return response()->json([
                "messege" => "todo update successfully.",
                "code" => 201,
            ]);
        }
    }

    public function delete($id)
    {
        $query = app('db')->delete(
            "DELETE FROM todos WHERE id = ?",
            [$id]
        );
        if ($query) {
            return response()->json([
                "messege" => "todo delete successfully.",
                "code" => 200,
            ]);
        }
    }

}
