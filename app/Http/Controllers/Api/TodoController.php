<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //

    public function getTodo($id){
        $todo = Todo::find(id: $id);
        return $todo;
    }

    public function postTodo(Request $request){
        
        if(Todo::create(attributes: [
            'name' => $request->name,
            'status' => 'pending'
        ]) ){
            return response()->json(data: ['meesage' => 'Todo Successfuly Added'], status: 201);
        }else{
            return response()->json(data: ['meesage' => 'Something went Wrong'], status: 500);
        }
        
    }
}
