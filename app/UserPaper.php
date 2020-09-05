<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPaper extends Model
{
    protected $fillable = [
        'paper_title', 'author_name', 'file_location','abstract'.'manuscript_type','subject_area'
        ,'suggested_reviewer','cover_letter','agreement_letter','other_files','user_email','review','text'
    ];
}
