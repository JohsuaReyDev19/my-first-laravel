<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\TodoController;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public $todoController;

    public function __construct(){
        $this->todoController = new TodoController;
        return;
    }

    public function index(){
        $todos = Todo::all();
        return Inertia::render('Home', props: compact(var_name: 'todos'));
    }
    public function createTodos(){
        return Inertia::render('HomeCreate');

    }
    public function show($todoId){
        $todo = $this->todoController->getTodo($todoId);

        return Inertia::render('HomeView', props: compact(var_name: 'todo'));
    }
}
