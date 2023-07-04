<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Http;
use App\Models\Giria;
use App\Models\Idiom;
use App\Models\User;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;

        if($giriasDesseUsuario = Giria::where('criadoPor', $userId)->get()){
            foreach($giriasDesseUsuario as $giria){
                // $giria = json_decode($giria);
                $giria->significados = explode("*", $giria->significados);
            }
        }


        return view('home', ['giriasDesseUsuario' => $giriasDesseUsuario]);
    }

    public function idiomsPage()
    {
        $userId = Auth::user()->id;
        $idiomsDesseUsuario = Idiom::where('criadoPor', $userId)->get();
    
        return view('home', ['idiomsDesseUsuario' => $idiomsDesseUsuario]);
    }

    public function userOptionsPage(){
        return view("user-options", ['userData' => Auth::user()]);
    }

    public function resetUserPasswordFromOptionsPage(){
        $currentUserEmail = Auth::user()->email; 
        
        $status = Password::sendResetLink(
            ['email' => $currentUserEmail]
        );
        
        // dd($currentUserEmail);
        return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
             
    }

    public function alterUser(Request $request){
        $currentUserId = Auth::user()->id;       
        $currentUserObj = User::findOrFail($currentUserId);
        $currentUserObj->name = $request->name;

        $updateStatus = $currentUserObj->save(); 

        return $updateStatus == 1
            ? back()->with(['status' => 'Dados alterados com sucesso.'])
            : back()->withErrors(['not_possible' => 'Não foi possível alterar os dados cadastrais.']);
    }

    public function deleteAccount(Request $request){
        try{
            $currentUserId = Auth::user()->id;

            $deletedGirias = Giria::where('criadoPor', $currentUserId)->delete();
            $deletedIdioms = Idiom::where('criadoPor', $currentUserId)->delete();

            $user = User::find(Auth::user()->id);

            Auth::logout();

            if ($user->delete()) {
                return redirect('/');
            }
        }catch(Exception $e){
            return back()->withErrors(['not_possible' => 'Não foi possível alterar os dados cadastrais.']);
        }

    }

}
