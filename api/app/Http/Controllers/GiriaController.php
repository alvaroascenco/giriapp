<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Giria;
use App\Http\Requests\GiriaRequest;
use Auth;


class GiriaController extends Controller
{
    public function __construct(){
        // $this->middleware(['auth', 'verified']);
    }

    public function treatGiriaFields($giria){

        $giria->significados = explode('*', $giria->significados);
        $giria->significados = array_filter($giria->significados);
        $giria->local = explode('/', $giria->local);
        $giria->local = array_filter($giria->local);
        return $giria;
    }

    public function getGirias($page){
        //fetching every entry on the giria table and slicing meanings and regions into arrays
        $girias = Giria::offset($page*18)->limit(18)->get();
        foreach($girias as $giria){
            $this->treatGiriaFields($giria);
        }

        $res = [];
        $res['girias'] = $girias;
        $res['isFinishedGirias'] = count($girias) < 18;
        return $res;
    }

    public function getGiria($id){

        //fetching specific giria info based on id
        $giria = Giria::where('id', $id)->first();
        $this->treatGiriaFields($giria);
        return $giria;

    }

    public function filterGirias($str){

        //fetching filtered girias info on database
        $girias = Giria::where('nome', 'like', "%$str%")->get();
        foreach($girias as $giria){
            $this->treatGiriaFields($giria);
        }

        //TODO: pagination
        $res = [];
        $res['girias'] = $girias;
        $res['isFinishedGirias'] = true;
        return $res;
    }

    public function newGiria(){
      return view('create');
    }

    public function createGiria(GiriaRequest $request){

        $giria = new Giria;

        $giria->criadoPor = Auth::user()->id;

        $giria->nome = $request->nome;

        $giria->local = implode('/', $request->local);
        $giria->significados = implode(';*', $request->significado);

        $giria->etimologia = isset($request->etimologia) ? $request->etimologia : null;
        $giria->imagem = $request->imagem;
        if(!empty($request->url) && $explodedURL = explode('watch?v=', $request->url)){
            $giria->videoId = $explodedURL[1];
        }

        if($giria->save()){
            return redirect('/home');
        }

        return view('create');

    }

    public function editGiria(Request $request, $giriaId){
        $giriaToEdit = Giria::findOrFail($giriaId);
        $giriaToEdit->local = explode('/', $giriaToEdit->local);
        $giriaToEdit->significados = strpos($giriaToEdit->significados, ';*') > 0 ?
            explode(';*', substr($giriaToEdit->significados, 0, -1)) :
            [$giriaToEdit->significados];

        return view('create', ['giriaToEdit' => $giriaToEdit]);
    }

    public function updateGiria(GiriaRequest $request, $giriaId){
        $giria =  Giria::findOrFail($giriaId);

        $giria->nome = $request->nome;

        $giria->local = implode('/', $request->local);
        $giria->significados = implode(';*', $request->significado);

        $giria->etimologia = isset($request->etimologia) ? $request->etimologia : null;
        $giria->imagem = $request->imagem;
        if(!empty($request->url) && $explodedURL = explode('watch?v=', $request->url)){
            $giria->videoId = $explodedURL[1];
        }

        if($giria->save()){
            return redirect('/home');
        }

        return editGiria($request, $giriaId);
    }

    public function deleteGiria($giriaId){
        $giria = Giria::find($giriaId);

        if($giria->delete()){
            return app('App\Http\Controllers\HomeController')->index();
        } else {
            return view('create');
        }
    }

}
