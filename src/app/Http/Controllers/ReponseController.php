<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reponses = Reponse::all();
        return view('user.detailQuestion');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.detailQuestion');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $reponse = new Reponse();
        $reponse->content = $request->content;
        $reponse->user_id = Auth::id();
        $reponse->question_id = $request->question_id;
        $reponse->save();

        return redirect()->route('questions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id , Request $request)
    {
        return view('user.editReponse' , compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);
        $reponse = Reponse::find($id);
        $reponse->content = $request->content;
        $reponse->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reponse = Reponse::find($id);
        $reponse->delete();

        return redirect()->route('questions.index');
    }
}
