<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $table      = 'tweets';
    protected $primaryKey = 'id';
    public $timestamps    = true;

    public function user(){
        return $this->belongsTo('App\User');
        
    }
}
