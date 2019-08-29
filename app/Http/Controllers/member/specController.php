<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\specModel;

class specController extends Controller
{
    public function getAllSpec(){
        $sp = specModel::query()
        ->select('gelar','spec')
        ->get();

        $returnHtml = view('attribute/comboSpec')->with('sp',$sp)->render();
        return response()->json(array('success' => true, 'html' => $returnHtml));
    }
    //
}
