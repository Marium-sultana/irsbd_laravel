<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IrsMember extends Model
{
    protected $fillable = [
        'member_name', 'member_designation','member_image', 'member_contact_no','member_email','member_profile_link'
    ];
}
