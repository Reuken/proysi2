<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    protected $table = 'permissions';
    public $timestamps = false;
    protected $fillable = [
        'id_user'
    ];
}
