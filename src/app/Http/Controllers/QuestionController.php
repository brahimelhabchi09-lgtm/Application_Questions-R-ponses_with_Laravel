<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::paginate(10);
        return view('user.questions', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('user.createQuestion');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $question = new Question();
        $question->title = $request->title;
        $question->content = $request->content;
        $question->user_id = Auth::id();
        $question->save();

        return redirect()->route('questions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = Question::find($id);
        return view('user.detailQuestion', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id , Request $request)
    {
        return view('user.createQuestion');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $question = Question::find($id);
        $question->title = $request->title;
        $question->content = $request->content;
        $question->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id , Request $request)
    {
        $question = Question::find($id);
        $question->delete();

        return redirect()->route('questions.index');
    }
}
