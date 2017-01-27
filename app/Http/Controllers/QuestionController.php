<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    public function inputPage()
    {
        return view('input/question');
    }

    public function input(Request $request)
    {
        $questions = explode("\n", $request->text);
        
        return response()->json($questions[0]);
    }
}
