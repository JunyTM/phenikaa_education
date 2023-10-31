<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class groupQuestionsController extends Controller
{
    public function index() {
        $groupQuestions = groupQuestions::all();
        return response()->json([
            "success" => true,
            "message" => "Get all group questions is successfully",
            "data" => $groupQuestions
        ]);
    }

    public function store(Request $request) {
        $groupQuestions = new groupQuestions;
        $groupQuestions->groupId = $request->groupId;
        $groupQuestions->groupName = $request->groupName;
        $groupQuestions->save();
        return response()->json([
            "success" => true,
            "message" => "Create group question is successfully",
            "data" => $groupQuestions
        ]);
    }

    public function delete($id) {
        $groupQuestions = groupQuestions::find($id);
        $groupQuestions->delete();
        return response()->json([
            "success" => true,
            "message" => "Delete group question is successfully",
            "data" => $groupQuestions
        ]);
    }
}
