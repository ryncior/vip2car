<?php

namespace App\Http\Controllers;

use App\Models\answers;
use App\Models\surveys;
use App\Models\questions;
use App\Models\choices;
use App\Models\responses;

use Illuminate\Http\Request;

class SurveysController extends Controller
{

    public function showForm($id = 1)
    {   
        $surveys = Surveys::findOrFail($id); // Traer todas las encuestas
        $questions = questions::all();
        $choices = choices::all();

        return view('welcome', compact('surveys','questions','choices'));
    
    }

    public function submitForm(Request $request)
    {
        // Validar que todas las preguntas estén respondidas
        $questions = questions::all();
        $object = [];

        foreach($questions as $question) {
            $object['question_' . $question->id] = 'required|string';
        }
        $request->validate($object);

        // Crear una nueva respuesta general
        $response = responses::create([
            'survey_id' => 1, // ID fijo si solo tienes una encuesta
            'submitted_at' => now(),
        ]);

        // Guardar cada respuesta individual
        $answers = [];
        foreach($questions as $question) {
            $answers[] = [
                'question_id' => $question->id,
                'answer_value' => $request->input('question_' . $question->id),
                'type' =>$question->type,
            ];
        }
        foreach ($answers as $answerData) {
            $answer = new answers();
            $answer->response_id = $response->id;
            $answer->question_id = $answerData['question_id'];

            if ($answerData['type'] == 'text') {
                // Pregunta abierta (texto)
                $answer->answer_text = $answerData['answer_value'];
            } else {
                $answer->choice_id = $answerData['answer_value'];
            }

            $answer->save();
        }

        return redirect()->back()->with('success', '¡Gracias por completar la encuesta!');
    }

    
}
