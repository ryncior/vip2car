<?php

namespace App\Http\Controllers;

use App\Models\responses;
use App\Models\answers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResponsesController extends Controller
{
    public function showList()
    {   
        $responses = responses::all(); // Traer todas las encuestas

        return view('list', compact('responses'));
    
    }

    public function showListDetails($id = 1)
    {   
        $answers = DB::select('select a.question_id,
                a.answer_text,
                (select q.question_text from questions q where a.question_id = q.id) as pregunta,
                (select c.choice_text from choices c where a.choice_id =c.id) as respuesta
                from answers a where a.response_id = ?',[$id]); // Traer todas las encuestas

        return view('listDetails', compact('answers'));
    
    }
}
