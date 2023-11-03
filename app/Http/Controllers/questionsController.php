<?php

namespace App\Http\Controllers;

use App\Models\questions;
use Illuminate\Http\Request;

class questionsController extends Controller
{
    public function index($groupId) {
        $questions = questions::where("groupId", $groupId)->get();
        return response()->json([
            "success" => true,
            "message" => "Get all questions is successfully",
            "data" => $questions
        ]);
    }

    public function store(Request $request) {
        $questions = new questions;
        $questions->groupId = $request->groupId;
        $questions->question = $request->question;
        // $questions->category = $request->category;
        // $questions->difficulty = $request->difficulty;
        // $questions->type = $request->type;
        $questions->save();
        return response()->json([
            "success" => true,
            "message" => "Create question is successfully",
            "data" => $questions
        ]);
    }

    public function updateQuestion(Requets $request, $id) {
        $questions = questions::find($id);
        $questions->question = $request->question;
        $questions->groupId = $request->groupId;
        // $questions->category = $request->category;
        // $questions->difficulty = $request->difficulty;
        // $questions->type = $request->type;
        $questions->save();
        return response()->json([
            "success" => true,
            "message" => "Update question is successfully",
            "data" => $questions
        ]);
    }

    public function deleteQuestion($id) {
        $questions = questions::find($id);
        $questions->delete();
        return response()->json([
            "success" => true,
            "message" => "Delete question is successfully",
            "data" => $questions
        ]);
    }
}
