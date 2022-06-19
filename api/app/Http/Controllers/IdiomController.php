<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idiom;
use Auth;

class IdiomController extends Controller
{

    public function idiomCreationForm(){
        return view('createIdiom');
    }

    public function createIdiom(Request $request){
        
        $validation = $request->validate([
            'expressao_pt' => 'required|unique:idiom|max:255',
            'expressao_en' => 'required|unique:idiom|max:255'
        ],
        [
            'expressao_pt.unique' => 'Essa expressão já está cadastrada em português.',
            'expressao_en.unique' => 'Essa expressão já está cadastrada em inglês.',

            'expressao_pt.required' => 'O campo Gíria em português é obrigatório.',
            'expressao_en.required' => 'O campo Gíria em inglês é obrigatório.',
            
            'max' => 'O limite máximo de caracteres permitidos foi excedido.',
        ]
        );

        $idiom = new Idiom;
        $idiom->criadoPor = Auth::user()->id; 
        $idiom->expressao_pt = $request->expressao_pt;
        $idiom->expressao_en = $request->expressao_en;

        
        
       if($idiom->save()){
           return redirect('/idioms');
       };
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
        $res['idioms'] = $idioms;
        $res['isFinishedIdioms'] = true;
        
        return $data;
    }

    public function updateIdiom(Request $request, $idiomId){

        $updateIdiom = Idiom::findOrFail($idiomId);
        $updateIdiom->expressao_pt = $request->expressao_pt;
        $updateIdiom->expressao_en = $request->expressao_en;

        if($updateIdiom->save()){
            return response($updateIdiom,200);
        }
    }
    public function deleteIdiom($idiomId){

        $idiom = Idiom::find($idiomId);

        if($idiom->delete()){
            return response("Ok",200);
        } 
    }
}
