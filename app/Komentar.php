<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $fillable = ['pemberi_komentar_id','isi','pertanyaan_id','jawaban_id'];

    public function user(){
        return $this->belongsTo('App\User', 'pemberi_komentar_id', 'id');
    }

    public function pertanyaan(){
        return $this->belongsTo('App\Pertanyaan', 'pertanyaan_id', 'id');
    }

    public function jawaban(){
        return $this->belongsTo('App\Jawaban', 'jawaban_id', 'id');
    }
}
