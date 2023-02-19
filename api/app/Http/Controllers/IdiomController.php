<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idiom;
use App\Http\Requests\IdiomRequest;
use Auth;

class IdiomController extends Controller
{

    public function __construct(){
        // $this->middleware(['auth', 'verified']);
    }

    public function idiomCreationForm(){
        return view('createIdiom');
    }

    public function createIdiom(IdiomRequest $request){

        $idiom = new Idiom;
        $idiom->criadoPor = Auth::user()->id;
        $idiom->expressao_pt = $request->expressao_pt;
        $idiom->expressao_en = $request->expressao_en;



       if($idiom->save()){
           return redirect('/idioms');
       };
    }

    public function editIdiomPage(Request $request, $giriaId){
        $idiom = Idiom::findOrFail($giriaId);
        return view('createIdiom', ['idiomToEdit' => $idiom]);
    }

    public function getIdioms(int $page){
        $idioms = Idiom::offset($page*18)->limit(18)->get();
        $data = [];
        foreach($idioms  as $idiom){
            $data[] = [
                'expressao_pt' => $idiom->expressao_pt,
                'expressao_en' => $idiom->expressao_en
            ];
        }

        $res = [];
        $res['idioms'] = $data;
        $res['isFinishedIdioms'] = count($data) < 18;
        return $res;
    }

    public function filterIdioms(string $term): Array{

        $idioms = Idiom::where("expressao_pt", 'like', "%$term%")->orWhere("expressao_en", 'like', "%$term%")->get();

        $data = [];
        foreach($idioms  as $idiom){
            $data[] = [
                'expressao_pt' => $idiom->expressao_pt,
                'expressao_en' => $idiom->expressao_en
            ];
        }

        $res = [];
        $res['idioms'] = $data;
        $res['isFinishedIdioms'] = true;

        return $res;
    }

    public function updateIdiom(IdiomRequest $request, $idiomId){

        $updateIdiom = Idiom::findOrFail($idiomId);
        $updateIdiom->expressao_pt = $request->expressao_pt;
        $updateIdiom->expressao_en = $request->expressao_en;

        if($updateIdiom->save()){
            return redirect('/idioms');
        }
    }
    public function deleteIdiom($idiomId){

        $idiom = Idiom::find($idiomId);

        if($idiom->delete()){
            return redirect("/idioms");
        }
    }
}
