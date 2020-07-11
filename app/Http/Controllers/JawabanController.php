<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban;

class JawabanController extends Controller
{
    public function upvote($id, Request $request){
        Jawaban::store_upvote($id, $request);
        
        return redirect('/pertanyaan/'.$id);
    }
    
    public function downvote($id, Request $request){
        Jawaban::store_downvote($id, $request);
        
        return redirect('/pertanyaan/'.$id);
    }
    
    public function resolved($id, Request $request){
        Jawaban::store_resolved($id, $request);
        
        return redirect('/pertanyaan/'.$id);
    }
}
