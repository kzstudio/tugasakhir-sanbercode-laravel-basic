<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public static function store_reputasi($model,$jenis){
        $user_id = null;
        if ($jenis == 'pertanyaan' || $jenis == 'jawaban'){
            $user_id = $model->user_id;

        }

        if (!empty($user_id)){
            $user = self::find($user_id);
            $user->total_reputasi += $model->poin_reputasi;
            $user->updated_at = date('Y-m-d H:i:s');
            $user->save();
        }
        return $user;
    }

    public function pertanyaan(){
        return $this->belongsTo('App\Pertanyaan');
    }
}
