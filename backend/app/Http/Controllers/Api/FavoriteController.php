<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $favorites = $request->user()
            ->favorites()
            ->with(['question.user', 'question' => fn($q) => $q->withCount('responses')])
            ->latest()
            ->paginate(15);

        return $favorites;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
        ]);

        $favorite = Favorite::firstOrCreate([
            'user_id'     => $request->user()->id,
            'question_id' => $validated['question_id'],
        ]);

        return response()->json([
            'message'   => 'Ajouté aux favoris',
            'favorite'  => $favorite->load('question'),
        ], 201);
    }

    public function destroy($id)
    {
        $favorite = Favorite::where('user_id', request()->user()->id)
            ->findOrFail($id);
        $favorite->delete();

        return response()->json(['message' => 'Retiré des favoris']);
    }

    public function destroyByQuestion(Request $request, $question_id)
    {
        Favorite::where('user_id', $request->user()->id)
            ->where('question_id', $question_id)
            ->delete();

        return response()->json(['message' => 'Retiré des favoris']);
    }
}
