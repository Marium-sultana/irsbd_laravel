<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadedPaper extends Model
{
    protected $fillable = ['paper_title','author_name','file_location'];

    public function issue()
    {
        return $this->belongsTo('App\Issue');
    }
}
