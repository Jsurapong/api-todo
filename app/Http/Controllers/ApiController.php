<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class ApiController extends Controller
{
    //

    public function index()
    {
        //return ['version'=>'1.0'];

        $todo = Todo::all();

        return $todo;
    }

    public function create(Request $request)
    {
        $todo = new Todo;

        $todo->text = $request->text;

        $todo->save();

        $todo = $this->index();
        return $todo;
    }

    public function update(Request $request)
    {
        return $request;
        $todo = Todo::find($request->id);
        $todo->name = $request->text;
        $todo->save();
        return ['method' => 'update'];
    }

    public function delete(Request $request)
    {
        $todo = Todo::destroy($request->id);
        
        return ['method' => 'delete'];
    }
}
