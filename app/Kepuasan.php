<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Kepuasan extends Model
{
    public $timestamps = false;
    protected $fillable = ['user_id','upvote','poin_reputasi','resolved','downvote','pertanyaan_id','jawaban_id'];
    
     public static function store_kepuasan($model, $kepuasaan, $jenis, $request){
        $req = $request->user();
        $var = [
            'user_id' =>$req['id']
        ];
        
        if ($kepuasaan == 'upvote'){
            $var['upvote'] = 1;
            $var['poin_reputasi'] = 10;
        }elseif ($kepuasaan == 'downvote'){
            $var['downvote'] = 1;
            $var['poin_reputasi'] = -1;
        }elseif ($kepuasaan == 'resolved'){
            $var['resolved'] = 1;
            $var['poin_reputasi'] = 15;
        }
        
        if ($jenis == 'pertanyaan'){
            $var['pertanyaan_id'] = $model->id;
        }elseif ($jenis == 'jawaban'){
            $var['jawaban_id'] = $model->id;
        }
        
        $create = self::create($var);
        
        $user = User::store_reputasi($create,$jenis);
        
        return $create;
    }
}
