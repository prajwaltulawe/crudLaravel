<?php

namespace App\Http\Controllers;

use App\Models\todoLaravel;
use Illuminate\Http\Request;

class TodoLaravelController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $res = new todoLaravel;
        $res->name=$request->input('name');
        $res->save();

        return  redirect()->to('show');
    }

    public function show(todoLaravel $todoLaravel)
    {
        return view('todoShow')->with('todoArr',todoLaravel::all());
    }

    public function edit(todoLaravel $todoLaravel)
    {
        //
    }

    public function update(Request $request, todoLaravel $todoLaravel)
    {    
        $res = todoLaravel::find($request->id);
        $res->name=$request->name;
        $res->save();

        return  redirect()->to('show');
    }

    public function destroy(todoLaravel $todoLaravel, $id)
    {
        todoLaravel::destroy(array('id',$id));
        return Redirect()->to('show');
    }
}
