<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    protected $table = 'account';
    public $timestamps = false;

    public function cuenta(){
        return $this->belongsTo(cuenta::class);
    }
}
