<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // $projects = Project::all();

        // $projects = Project::with('type', 'technologies')->get();
        $projects = Project::with('type', 'technologies')->paginate(5);

        // in with() i parametri sono singolare o plurale a seconda della relazione che intercorre tra le tabelle
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }
}
