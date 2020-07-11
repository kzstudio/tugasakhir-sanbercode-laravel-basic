<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kepuasan;
class Jawaban extends Model
{
    protected $fillable = ['isi','pertanyaan_id','user_id','created_at'];

    public static function cek_has_voted($id, $request){
        
        $cek = Kepuasan::where(['jawaban_id'=>$id,'user_id'=>$request->user()['id']])->count();

        return !empty($cek)?'000':'200';
    }

    public static function store($pertanyaan_id, $request){
        $var = $request->all();
        $var['user_id'] = $request->user()['id'];
        $var['create_at'] = date('Y-m-d H:i:s');
        $var['pertanyaan_id'] = $pertanyaan_id;
        $create = self::create($var);
        return $create;
    }
    
    /**
     * untuk jawaban yang di klik upvote
     * @param type $id
     * @return type
     */
    public static function store_upvote($id,$request){

        $cek = self::cek_has_voted($id, $request);
        $update = self::find($id);

        if ($cek == '200'){
            $update = self::find($id);
            $update->jumlah_upvote += 1;//menhitung jumlah dipilih upvote
            $update->total_poinvote += 10;//menambahkan 10 poin
            $update->updated_at = date('Y-m-d H:i:s');
            $update->save();
            
            $kepuasan = Kepuasan::store_kepuasan($update, 'upvote','jawaban',$request);
            $msg = 'Vote berhasil';
            $status = '200';
        }else{
            $msg = 'Anda sudah melakukan vote, pada jawaban ini';
            $status = '000';
        }
        
        $data['vote'] = $update->jumlah_upvote - $update->jumlah_downvote;
        $data['msg'] = $msg;
        $data['status'] = $status;
        return $data;
    }
    
    /**
     * untuk jawaban yang di klik downvote
     * @param type $id
     * @return type
     */
    public static function store_downvote($id,$request){
        $cek = self::cek_has_voted($id, $request);
        $update = self::find($id);

        $total_reputasi = $request->user()['total_reputasi'];

        if ($total_reputasi > 15){
            if ($cek == '200'){
                $ok = true;
                $update = self::find($id);
                $update->jumlah_downvote += 1;//menhitung jumlah dipilih downvote
                $update->total_poinvote -= 1;//menambahkan -1 poin
                $update->updated_at = date('Y-m-d H:i:s');
                $update->save();
                
                $kepuasan = Kepuasan::store_kepuasan($update, 'downvote','jawaban',$request);
                $msg = 'Vote berhasil';
                $status = '200';
            }else{
                $msg = 'Anda sudah melakukan vote, pada jawaban ini';
                $status = '000';
            }
        }else{
            $msg = 'Reputasi minimal 15 poin';
            $status = '000';
        }
            
        $data['vote'] = $update->jumlah_upvote - $update->jumlah_downvote;
        $data['msg'] = $msg;
        $data['status'] = $status;
        return $data;
    }
    
    /**
     * untuk jawaban yang di klik resolved
     * @param type $id
     * @return type
     */
    public static function store_resolved($id,$request){
        $update = self::find($id);
        $update->resolved = 1;
        $update->total_poinvote += 15;//menambahkan 10 poin
        $update->updated_at = date('Y-m-d H:i:s');
        $update->save();
        
        $kepuasan = Kepuasan::store_kepuasan($update, 'resolved','jawaban',$request);
        
        return $update;
    }

    public function getTotalVoteAttribute(){
        return $this['jumlah_upvote'] - $this['jumlah_downvote'];
    }

    public function getLamanyaDibuatAttribute(){
        return $this['created_at']->diffForHumans();
    }

   
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function pertanyaan(){
        return $this->belongsTo('App\Pertanyaan');
    }

}
