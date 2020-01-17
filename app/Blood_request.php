<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blood_request extends Model
{
    protected $table ='blood_requests';
    protected $primaryKey = 'request_id';
    protected $fillable = ['request_text', 'blood_type', 'branch_id'];


    public function branch(){
        return $this->belongsTo('App\Branch', 'branch_id','branch_id');
    }
}
