<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public function uploadedPaper()
   {
       return $this->belongsTo('App\UploadedPaper','issue_id');
   }
}
