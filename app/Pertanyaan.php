<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Pertanyaan extends Model
{
    protected $guarded = ["jumlah_like"];
<<<<<<< HEAD

=======
    
>>>>>>> f85eb5f5c8b583a7f9a0ed634a20c1077977667e
    /**
     * untuk jawaban yang di klik upvote
     * @param type $id
     * @return type
     */
    public static function store_upvote($id, $request){
        $update = self::find($id);
        $update->jumlah_upvote += 1;//menhitung jumlah dipilih upvote
        $update->total_poinvote += 10;//menambahkan 10 poin
        $update->updated_at = date('Y-m-d H:i:s');
        $update->save();
<<<<<<< HEAD

        $kepuasan = Kepuasan::store_kepuasan($update, 'upvote','pertanyaan', $request);

        return $update;
    }

=======
        
        $kepuasan = Kepuasan::store_kepuasan($update, 'upvote','pertanyaan', $request);
        
        return $update;
    }
    
>>>>>>> f85eb5f5c8b583a7f9a0ed634a20c1077977667e
    /**
     * untuk jawaban yang di klik downvote
     * @param type $id
     * @return type
     */
    public static function store_downvote($id, $request){
        $ok = true;
        $update = self::find($id);
        $update->jumlah_downvote += 1;//menhitung jumlah dipilih downvote
        $update->total_poinvote -= 1;//menambahkan -1 poin
        $update->updated_at = date('Y-m-d H:i:s');
        $update->save();
<<<<<<< HEAD

        $kepuasan = Kepuasan::store_kepuasan($update, 'downvote','pertanyaan', $request);

        return $update;
    }

=======
        
        $kepuasan = Kepuasan::store_kepuasan($update, 'downvote','pertanyaan', $request);
        
        return $update;
    }
>>>>>>> f85eb5f5c8b583a7f9a0ed634a20c1077977667e
}
