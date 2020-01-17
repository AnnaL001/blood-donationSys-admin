<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table ='branches';
    protected $primaryKey = 'branch_id';
    protected $fillable = ['branch_name', 'branch_type','branch_location'];

    public function blood_request()
    {
        return $this->hasMany('App\Blood_request');
    }

    public function donation()
    {
        return $this->hasMany('App\Donation');
    }

}
