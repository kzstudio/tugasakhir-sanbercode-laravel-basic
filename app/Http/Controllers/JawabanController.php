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

    public function resolved($id, Request $request){
        $model = Jawaban::store_resolved($id, $request);

        return redirect('/pertanyaan/'.$model->pertanyaan_id.'/'.$model->pertanyaan->slug);
    }

    public function generate_form_jawaban($id, Request $request)
    {
        $jawaban = Jawaban::find($id);
        $model['form'] = view('jawaban.loadform_jawaban',compact('jawaban'))->render();
        return response()->json( $model, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $jawaban = Jawaban::find($id);
        $jawaban->updated_at = date('Y-m-d H:i:s');
        $jawaban->isi = $request['isi'];
        $jawaban->save();

        return redirect('/pertanyaan/'.$jawaban->pertanyaan_id.'/'.$jawaban->pertanyaan->slug);
    }
}
