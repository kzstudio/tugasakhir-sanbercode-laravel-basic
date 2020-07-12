<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class PertanyaanModel {
    public static function find_by_id($id){
            $pertanyaan = DB::table('pertanyaans')->where('id', $id)->first();
            return $pertanyaan;
        }
        public static function update($id, $request){
            // dd($request);
            $pertanyaan = DB::table('pertanyaans')
                    ->where('id', $id)
                    ->update([
                        'judul' => $request["judul"],
                        'isi' => $request["isi"],
                        'tags'=>$request['tags']
                    ]);
            return $pertanyaan;
        }

        public static function destroy($id){
            $deleted = DB::table('pertanyaans')
                          ->where('id', $id)
                          ->delete();
            return $deleted;
          }
    }
