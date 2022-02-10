<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$datas = User::paginate(5);
        $i = 0;
        return view('home',compact('datas','i'));*/
        return redirect()->route('home');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idAdmin = Option::all()->first()->user_id;
        if(auth()->user()->id == $idAdmin ){
            return view('user.create');
        }
        return redirect()->route('allDiagnostic');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users'
            ],
            'password' => ['required','string']
        ]);

        $idAdmin = Option::all()->first()->user_id;
        if(auth()->user()->id == $idAdmin ){
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);

            return redirect()->route('allUser');
        }
        

        return redirect()->route('allDiagnostic');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $idAdmin = Option::all()->first()->user_id;
        if(auth()->user()->id == $idAdmin ){
            if(isset($user)){
            
                return view('user.update', compact('user'));
            }
    
        }
        
        return redirect()->route('allDiagnostic');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users'
            ],
            'password' => ['required','string']
        ]);

        $idAdmin = Option::all()->first()->user_id;
        if(auth()->user()->id == $idAdmin ){
            //dd($user);
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();
        }

        return redirect()->route('allDiagnostic');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $idAdmin = Option::all()->first()->user_id;
        if(auth()->user()->id == $idAdmin ){
            if(isset($user)){
                $user->delete();

            }

            return redirect()->route('allUser');
        }
        return redirect()->route('allDiagnostic');
    }
}
