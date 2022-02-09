<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
        return Question::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|max:255',
            'categorie' => 'required|max:255',
        ]);
        $question = new Question();
        $question->question = $data['question'];
        $question->categorie_id = $data['categorie'];
        $question->user_id = auth()->user()->id;
        $question->slug = Str::slug(Str::random(10));
        $question->save();
        return redirect()->route('question');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return Question::where("id", $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $question = Question::where('slug',$slug)->first();
        if(isset($question)){

            return view('question.update', compact('question'));
        }

        return redirect()->route('question');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $data = Question::find($id);

        if(isset($data)){
            $data->question = $request->question;
            $data->categorie_id = $request->categorie;
            $data->user_id = auth()->user()->id;
            $data->slug = Str::slug(Str::random(10));
            $data->save();
        }
       
        

        return redirect()->route('question');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {

        $data = Question::where('slug', $slug)->first();
        if(isset($data)){
            $data->delete();
            
        }

        return redirect()->route('question');
    }
}
