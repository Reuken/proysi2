<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class summary extends Model
{
    protected $table = 'summary';
    public $timestamps = false;

    public function account(){
        return $this->belongsTo(account::class);
    }
}
