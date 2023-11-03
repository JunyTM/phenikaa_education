<?php

namespace App\Http\Controllers;

use App\Models\group_questions;
use Illuminate\Http\Request;

class groupQuestionsController extends Controller
{
    public function index() {
        $groupQuestions = group_questions::all();
        return response()->json([
            "success" => true,
            "message" => "Get all group questions is successfully",
            "data" => $groupQuestions
        ]);
    }

    public function groupId($id) {
        $groupQuestions = group_questions::where("id", $id)->get();
        return response()->json([
            "success" => true,
            "message" => "Get all group questions is successfully",
            "data" => $groupQuestions
        ]);
    }

    public function store(Request $request) {
        $groupQuestions = new group_questions;
        $groupQuestions->groupName = $request->groupName;
        $groupQuestions->save();
        return response()->json([
            "success" => true,
            "message" => "Create group question is successfully",
            "data" => $groupQuestions
        ]);
    }

    public function delete($id) {
        $groupQuestions = group_questions::find($id);
        $groupQuestions->delete();
        return response()->json([
            "success" => true,
            "message" => "Delete group question is successfully",
            "data" => $groupQuestions
        ]);
    }
}
