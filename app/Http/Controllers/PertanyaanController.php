<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PertanyaanModel;
use App\Pertanyaan;
use App\Jawaban;
use App\User;
use App\Komentar;
use App\Kepuasan;

class PertanyaanController extends Controller
{
    
    public function init(){
        $this->middleware->except('index');
    }

    public function store_komentar($id, Request $request){
        $new_pertanyaan = Komentar::create([
            'isi' => !empty($request['isi'])?$request['isi']:'-',
            'pemberi_komentar_id'=>$request->user()['id'],
            'pertanyaan_id'=>$id
        ]);

        return redirect('/pertanyaan/'.$id.'/'.$new_pertanyaan->pertanyaan->slug);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perpage = isset($_GET['perpage'])?$_GET['perpage']:5;
        $pertanyaan = Pertanyaan::orderBy('created_at', 'desc')->paginate($perpage);
       // $get = Pertanyaan::status();
        return view('pertanyaan.timeline', compact('pertanyaan','perpage'));
    }

    public function cari()
    {
        $q = isset($_GET['q'])?$_GET['q']:'';
        $perpage = 5;
        $pertanyaan = Pertanyaan::where('judul','like', '%'.$q.'%')
                        ->orWhere('isi','like', '%'.$q.'%')
                        ->paginate($perpage);
       // $get = Pertanyaan::status();
        return view('pertanyaan.timeline', compact('pertanyaan','perpage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('pertanyaan.form', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_pertanyaan = Pertanyaan::create([
            'judul' => $request['judul'],
            'isi' => $request['isi'],
            'user_id' => $request->user()['id'],
            'tags'=>$request['tags']
        ]);
        return redirect('/pertanyaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perpage = isset($_GET['perpage'])?$_GET['perpage']:5;
        $pertanyaan = Pertanyaan::find($id);
        $jawaban = Jawaban::where(['pertanyaan_id'=>$id])->paginate($perpage);
        $komentar_pertanyaan = Komentar::where(['pertanyaan_id'=>$id])->get();
        return view('pertanyaan.info',compact('pertanyaan','jawaban','perpage','komentar_pertanyaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $users = User::all();
        return view('pertanyaan.edit',compact('pertanyaan', 'users'));
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
        $pertanyaan = PertanyaanModel::update($id, $request->all());
        return redirect('/pertanyaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        $cek = Kepuasan::where(['pertanyaan_id'=>$id])->count();

        if ($cek > 0){
            $model['msg'] = 'Pertanyaan tidak bisa dihapus, karena sudah di vote';
            $model['status'] = 0;
        }else{
            $cekJawaban = Jawaban::where(['pertanyaan_id'=>$id])->count();

            if ($cekJawaban > 0){
                $model['msg'] = 'Pertanyaan tidak bisa dihapus, karena sudah di jawab';
                $model['status'] = 0;
            }else{
                $deleted = PertanyaanModel::destroy($id);
                $model['msg'] = 'Pertanyaan berhasil dihapus';
                $model['status'] = 1;
            }
        }

        return response()->json( $model, 200);
    }

    public function upvote($id, Request $request)
    {
        $model = Pertanyaan::store_upvote($id, $request);
        
        return response()->json( $model, 200);
    }

    public function downvote($id, Request $request){
        $model = Pertanyaan::store_downvote($id, $request);

        return response()->json( $model, 200);
    }

    
}
