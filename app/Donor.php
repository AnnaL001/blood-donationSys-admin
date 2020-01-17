<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{

    protected $primaryKey = 'donor_id';
    protected $fillable = ['first_name', 'last_name', 'surname', 'email','password','phoneNo', 'gender', 'blood_type','can_donate',];

    protected $hidden = ['password','gps_location'];
     
     public function donations(){
     	return $this->hasMany('App\Donations');
     }

}
