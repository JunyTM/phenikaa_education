<?php

namespace App\Http\Controllers;

use App\Models\answers;
use Illuminate\Http\Request;

class answersController extends Controller
{
    public function index() {
        $answers = answers::all();
        return response()->json([
            "success" => true,
            "message" => "Get all answers is successfully",
            "data" => $answers
        ]);
    }

    public function getAnswer($questionId) {
        $answers = answers::where("questionId", $questionId)->get();
        return response()->json([
            "success" => true,
            "message" => "Get all answers is successfully",
            "data" => $answers
        ]);
    }

    public function store(Request $request) {
        $answers = new answers;
        $answers->questionId = $request->questionId;
        $answers->answer = $request->answer;
        $answers->isCorrect = $request->isCorrect;
        $answers->save();
        return response()->json([
            "success" => true,
            "message" => "Create answer is successfully",
            "data" => $answers
        ]);
    }

    public function delete($id) {
        $answers = answers::find($id);
        $answers->delete();
        return response()->json([
            "success" => true,
            "message" => "Delete answer is successfully",
            "data" => $answers
        ]);
    }
}
