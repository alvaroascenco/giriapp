<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocsController extends Controller
{
    public function apiDocs(){
        return view('docs.apiDocs');
    }
}
