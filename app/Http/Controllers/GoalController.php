<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index()
    {
        $goals = Goal::all();
        return response()->json($goals);
    }

    public function show($id)
    {
        $goal = Goal::find($id);
        if ($goal) {
            return response()->json($goal);
        }
        return response()->json(['message' => 'Goal not found'], 404);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'target_amount' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);

        $goal = Goal::create($validated);
        return response()->json($goal, 201);
    }

    public function update(Request $request, $id)
    {
        $goal = Goal::find($id);
        if (!$goal) {
            return response()->json(['message' => 'Goal not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'target_amount' => 'sometimes|required|numeric',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $goal->update($validated);
        return response()->json($goal);
    }

    public function destroy($id)
    {
        $goal = Goal::find($id);
        if (!$goal) {
            return response()->json(['message' => 'Goal not found'], 404);
        }

        $goal->delete();
        return response()->json(['message' => 'Goal deleted successfully']);
    }
}
