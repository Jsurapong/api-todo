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

        if ($todo) {
            $status = 200;
        } else {
            $status = 500;
        }

        return [
                    'method'=>'GET',
                    'statue' => $status,
                    'data' => $todo
                ];
    }

    public function create(Request $request)
    {
        $todo = new Todo;

        $todo->text = $request->text;

        if ($todo->save()) {
            $status = 200;
        } else {
            $status = 500;
        }

        $todo = $this->index();

        return [
                    'status' => $status,
                    'method' => 'Add',
                    'data' => $todo['data']
                ];
    }

    public function update(Request $request)
    {
        $todo = Todo::find($request->id);
        $todo->name = $request->text;

        if ($todo->save()) {
            $status = 200;
        } else {
            $status = 500;
        }

        $todo = $this->index();

        return [
                    'status' => $status,
                    'method' => 'Update',
                    'data' => $todo['data']
                ];
    }

    public function delete(Request $request)
    {
        $todo = Todo::destroy($request->id);
        
        if ($todo) {
            $status = 200;
        } else {
            $status = 500;
        }

        $todo = $this->index();

        return [
                    'status' => $status,
                    'method' => 'Delete',
                    'data' => $todo['data']
                ];
    }
}
