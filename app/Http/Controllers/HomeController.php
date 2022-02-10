<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;
use App\Models\Diagnostic;
use App\Models\Option;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datas = Diagnostic::paginate(5);
        $i = 0;
        return view('home',compact('datas','i'));
    }

    public function question(){

        $idAdmin = Option::all()->first()->user_id;
            if(auth()->user()->id == $idAdmin ){
                $datas = Question::paginate(5);
                $i = 0;
            return view('home',compact('datas','i'));

        }
        return redirect()->route('allDiagnostic');

        
    }

    public function user(){

        $idAdmin = Option::all()->first()->user_id;
            if(auth()->user()->id == $idAdmin ){
                $datas = User::paginate(5);
                $i = 0;
                return view('home',compact('datas','i'));
        }
        return redirect()->route('allDiagnostic');
        
    }


    public function updateQuestion(Request $request){

        $data = $request->validate([
            'question' => 'required|max:255',
            'categorie' => 'required|max:255',
        ]);
         
        return "update question";
    }

    public function createUser(){
         
        return view('user.create');
    }

    public function updateUser(){
         
        return "update question";
    }



    /** CRUD Diagnostic */

    public function getAlldiagnostic(){

        return Diagnostic::all();
    }

    public function storeDiagnostique(Request $request){

    }

    public function createDiagnostic(){
        $data = new Diagnostic();
        $data->user_id = auth()->user()->id;
        $data->slug = Str::slug(Str::random(10));
        $data->save();
        return [
            "diagnostic_id" => $data->id,
            "Categories 1" => Categorie::find(1)->questions()->get(),
            "Categories 2" => Categorie::find(2)->questions()->get(),
            "Categories 3" => Categorie::find(3)->questions()->get(),
            "Categories 4" => Categorie::find(4)->questions()->get()
        ];
    }

    public function getdiagnostic($id){

        $data = Diagnostic::find($id);
        if(isset($data)){
            return $data;
        }
        return "le diagnostic n'existe pas";
    }


    public function destroyDiagnostic($id){
        $data = Diagnostic::find($id);
        if(isset($data)){
            $data->delete();
            return "le diagnostique a ete supprimer";
        }
        return "Rien a supprimer";
    }

    /**Creation et affichage de reponse */

    public function createReponse(Request $request){
        $diagnostic_id = $request->diagnostic_id;
        $data = new Reponse();
        $data->diagnostique_id = $request->diagnostic_id;
        $data->id_question = 0;
        $data->categorie_1 = $request->categorie_1;
        $data->categorie_2 = $request->categorie_2;
        $data->categorie_3 = $request->categorie_3;
        $data->categorie_4 = $request->categorie_4;
        $data->reponse = json_encode($request->reponses);
        $data->slug = Str::slug(Str::random(10));
        $data->save();
        
        return $data;
    }
}
