<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        // $projects = Project::all();

        //se nel request c'è type_id seleziono i project dal database del type corrispondente al filtro
        if ($request->has('type_id')) {
            // $projects = Project::with('type', 'technologies')->get();
            $projects = Project::with('type', 'technologies')
                ->where('type_id', $request->type_id)->paginate(5);
        } else {
            //altrimenti seleziono tutti i projects
            $projects = Project::with('type', 'technologies')->paginate(5);
        }


        // in with() i parametri sono singolare o plurale a seconda della relazione che intercorre tra le tabelle
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug)
    {
        $project = Project::with('type', 'technologies')->where('slug', $slug)->first();

        // se nell'api c'è almeno un project rispondente alla chiamata con il where ritorno il/i project stesso/i

        if ($project) {
            return response()->json([
                'success' => true,
                'project' => $project,
            ]);
        } else {
            //altrimenti ritorno un messaggio di errore
            return response()->json([
                'success' => true,
                'error' => 'Nessun progetto corrispondente',
            ]);
        }
    }
}
