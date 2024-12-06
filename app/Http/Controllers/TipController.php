<?php
namespace App\Http\Controllers;

use App\Models\Tip;
use Illuminate\Http\Request;

class TipController extends Controller
{
    public function index()
    {
        return response()->json(Tip::all());
    }

    public function show($id)
    {
        $tip = Tip::find($id);
        if (!$tip) {
            return response()->json(['error' => 'Tip not found'], 404);
        }
        return response()->json($tip);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $tip = Tip::create($validated);
        return response()->json($tip, 201);
    }

    public function update(Request $request, $id)
    {
        $tip = Tip::find($id);
        if (!$tip) {
            return response()->json(['error' => 'Tip not found'], 404);
        }

        $tip->update($request->all());
        return response()->json($tip);
    }

    public function destroy($id)
    {
        $tip = Tip::find($id);
        if (!$tip) {
            return response()->json(['error' => 'Tip not found'], 404);
        }

        $tip->delete();
        return response()->json(['message' => 'Tip deleted successfully']);
    }
}

