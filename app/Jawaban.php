<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    public function store($request){
        $var = $request->all();
        $var['user_id'] = $request->user()['id'];
        $var['create_at'] = 
        $create = self::create()
    }
}
