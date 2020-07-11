<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kepuasan;

class Jawaban extends Model
{
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
        $update = self::find($id);
        $update->jumlah_upvote += 1;//menhitung jumlah dipilih upvote
        $update->total_poinvote += 10;//menambahkan 10 poin
        $update->updated_at = date('Y-m-d H:i:s');
        $update->save();
        
        $kepuasan = Kepuasan::store_kepuasan($update, 'upvote','jawaban',$request);
        
        return $update;
    }
    
    /**
     * untuk jawaban yang di klik downvote
     * @param type $id
     * @return type
     */
    public static function store_downvote($id,$request){
        $ok = true;
        $update = self::find($id);
        $update->jumlah_downvote += 1;//menhitung jumlah dipilih downvote
        $update->total_poinvote -= 1;//menambahkan -1 poin
        $update->updated_at = date('Y-m-d H:i:s');
        $update->save();
        
        $kepuasan = Kepuasan::store_kepuasan($update, 'downvote','jawaban',$request);
        
        return $update;
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
}
