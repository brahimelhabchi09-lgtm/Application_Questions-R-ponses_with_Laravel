<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReponseController extends Controller
{
  public function store(Request $request)
  {
    $validated = $request->validate([
      'content' => 'required|string',
      'question_id' => 'required|exists:questions,id',
    ]);

    $reponse = new Reponse();
    $reponse->content = $validated['content'];
    $reponse->question_id = $validated['question_id'];
    $reponse->user_id = Auth::id();
    $reponse->save();

    return response()->json([
      'message' => 'Réponse créée avec succès',
      'reponse' => $reponse->load('user')
    ], 201);
  }

  public function destroy($id)
  {
    $reponse = Reponse::findOrFail($id);
    $reponse->delete();
    return response()->json([]);
  }
}
