<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Jawaban;
use App\Kepuasan;

class Pertanyaan extends Model
{
    protected $guarded = ["jumlah_like"];


    public static function cek_has_voted($id, $request){
        $cek = Kepuasan::where(['pertanyaan_id'=>$id,'user_id'=>$request->user()['id']])->count();

        return !empty($cek)?'000':'200';
    }

    /**
     * untuk jawaban yang di klik upvote
     * @param type $id
     * @return type
     */
    public static function store_upvote($id, $request){

        $cek = self::cek_has_voted($id, $request);
        $update = self::find($id);

        if ($cek == '200'){
            $update->jumlah_upvote += 1;//menhitung jumlah dipilih upvote
            $update->total_poinvote += 10;//menambahkan 10 poin
            $update->updated_at = date('Y-m-d H:i:s');
            $update->save();
            
            $kepuasan = Kepuasan::store_kepuasan($update, 'upvote','pertanyaan', $request);
            $msg = 'Vote Sukses';
            $status = '200';
        }else{
            $msg = 'Anda sudah melakukan vote, pada pertanyaan ini';
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
    public static function store_downvote($id, $request){

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
                
                $kepuasan = Kepuasan::store_kepuasan($update, 'downvote','pertanyaan', $request);
                $msg = 'Vote berhasil';
                $status = '200';
            }else{
                $msg = 'Anda sudah melakukan vote, pada pertanyaan ini';
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

    public function getTotalVoteAttribute(){
        return $this['jumlah_upvote'] - $this['jumlah_downvote'];
    }

    public function getSlugAttribute($value)
    {
       
        //do whatever you want to do
        return Str::slug($this['judul'],'-');
    }

    public function getJumlahJawabanAttribute(){
        $jawab = Jawaban::where('pertanyaan_id', '=', $this['id']);
        return $jawab->count();
    }

    public function getSplitTagsAttribute(){
        $tags = !empty(trim($this['tags']))?explode(',',$this['tags']):[];
        return $tags;
    }

    public function getLamanyaDibuatAttribute(){
        return $this['created_at']->diffForHumans();
    }

    public function getStatusResolvedAttribute(){
        $where = [
            'pertanyaan_id'=>$this['id'],
            'resolved'=>1,
        ];
        $resolved = Jawaban::where($where)->count();
        return ($resolved>0)?true:false;
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
