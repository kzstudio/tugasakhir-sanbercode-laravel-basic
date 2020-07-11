<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban;
use App\Komentar;

class JawabanController extends Controller
{
    public function store_komentar($id, Request $request){
        $new_pertanyaan = Komentar::create([
            'isi' => !empty($request['isi'])?$request['isi']:'-',
            'pemberi_komentar_id'=>$request->user()['id'],
            'jawaban_id'=>$id
        ]);

        return redirect('/pertanyaan/'.$new_pertanyaan->pertanyaan_id.'/'.$new_pertanyaan->jawaban->slug);
    }

    public function store($pertanyaan_id, Request $request){
        $new_pertanyaan = Jawaban::create([
            'isi' => !empty($request['isi'])?$request['isi']:'-',
            'user_id'=>$request->user()['id'],
            'pertanyaan_id'=>$pertanyaan_id
        ]);

        return redirect('/pertanyaan/'.$pertanyaan_id.'/'.$new_pertanyaan->pertanyaan->slug);
    }                                                                                                                                                                                                                                                                                                                                                                  

    public function upvote($id, Request $request)
    {
        $model = Jawaban::store_upvote($id, $request);
        
        return response()->json( $model, 200);
    }

    public function downvote($id, Request $request){
        $model = Jawaban::store_downvote($id, $request);

        return response()->json( $model, 200);
    }
}
