<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::all();
        return response()->json($logs);
    }

    public function show($id)
    {
        $log = Log::find($id);
        if ($log) {
            return response()->json($log);
        }
        return response()->json(['message' => 'Log not found'], 404);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $log = Log::create($validated);
        return response()->json($log, 201);
    }

    public function update(Request $request, $id)
    {
        $log = Log::find($id);
        if (!$log) {
            return response()->json(['message' => 'Log not found'], 404);
        }

        $validated = $request->validate([
            'description' => 'sometimes|required|string|max:255',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $log->update($validated);
        return response()->json($log);
    }

    public function destroy($id)
    {
        $log = Log::find($id);
        if (!$log) {
            return response()->json(['message' => 'Log not found'], 404);
        }

        $log->delete();
        return response()->json(['message' => 'Log deleted successfully']);
    }
}
