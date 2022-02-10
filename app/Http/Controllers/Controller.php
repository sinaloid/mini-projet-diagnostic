<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Categorie;
use App\Models\Role;
use App\Models\Option;
use App\Models\User;
use App\Models\Diagnostic;
use App\Models\Question;
use App\Models\Reponse;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return "Diagnostic";
    }

    public function test(){

        $datas = Question::all();//->getColumnListing('question');
        $i = 1;
        return view('diagnos_test', compact('datas','i'));
    }

    public function createCategorie(){
        $categories = ['Attitude de fuite ou Passivité', 
        'Attitude dattaque ou Agressivité', 
        'Attitude de Manipulation', 'Attitude assertive'];

        $data = Categorie::all()->first();
        if(isset($data)){
            return "Les categories existent déjà";
        }
        foreach($categories as $str){
            $data = new Categorie();
            $data->nom_categorie = $str;
            $data->slug = Str::slug(Str::random(10));
            $data->save();
        }

        return "Categories creer avec success";
    }

    public function createRole(){
        $categories = ['user', 'admin'];
        $data = Role::all()->first();
        if(isset($data)){
            return "Les roles existent déjà";
        }
        foreach($categories as $str){
            $data = new Role();
            $data->role = $str;
            $data->save();
        }

        return "Roles creer avec success";
    }

    public function createSuperUser(Request $request){
        $user = User::where('email', $request->email)->first();


        if(isset($user)){
            $tmp = Option::get()->first();
            if(! isset($tmp)){
                $data = new Option();
                $data->user_id = $user->id;
                $data->nombre_de_test = 0;
                $data->moyen_assertivite = 0;
                $data->save();

                return  "Admin creer avec success";
            }
        }

        return "Impossible de creer un nouveau admin";
    }

    /** CRUD Diagnostic */

    public function getAlldiagnostic(){

        return Diagnostic::all();
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
