<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
  public function index()
  {
    // Return latest questions with their user and response count
    return Question::with('user')
      ->withCount('responses')
      ->latest()
      ->paginate(15);
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'title' => 'required|string|max:255',
      'content' => 'required|string',
    ]);

    $question = $request->user()->questions()->create($validated);

    return response()->json([
      'message' => 'Question créée avec succès',
      'question' => $question->load('user')
    ], 201);
  }

  public function show(Request $request, $id)
  {
    $question = Question::with(['user', 'responses.user'])->findOrFail($id);

    if ($request->user()) {
      $fav = $request->user()->favorites()->where('question_id', $id)->first();
      $question->is_favorited = (bool) $fav;
      $question->favorite_id = $fav?->id;
    }

    return $question;
  }

  public function update(Request $request, $id)
  {
    $question = Question::findOrFail($id);

    $validated = $request->validate([
      'title' => 'required|string|max:255',
      'content' => 'required|string',
    ]);

    $question->update($validated);

    return response()->json(['message' => 'Question mise à jour', 'question' => $question]);
  }

  public function destroy($id)
  {
    $question = Question::findOrFail($id);
    $question->delete();

    return response()->json([]);
  }
}
