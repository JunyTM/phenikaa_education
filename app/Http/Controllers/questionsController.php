<?php

namespace App\Http\Controllers;

use App\Models\questions;
use Illuminate\Http\Request;

class questionsController extends Controller
{
    public function store(Request $request) {
        $questions = new questions;
        $questions->question = $request->question;
        $questions->answer = $request->answer;
        $questions->save();
        return response()->json([
            "success" => true,
            "message" => "Create question is successfully",
            "data" => $questions
        ]);
    }
}
