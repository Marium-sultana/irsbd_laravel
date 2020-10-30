<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IrsMember extends Model
{
    protected $fillable = [
        'member_name','member_image'
    ];
}
