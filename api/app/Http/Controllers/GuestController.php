<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Giria;

class GuestController extends Controller
{
    public function index(){
        $giriaHoje = '';
        if(count(Giria::get()) > 0){
            $giriaHoje = Giria::inRandomOrder()->first();
            $giriaHoje->significados = explode("*", substr($giriaHoje->significados, 0, -1));
        }
        
        return view("welcome", ['giriaHoje' => $giriaHoje]);
    }
}
