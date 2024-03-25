<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;
use App\Models\Hospital;


class Patient extends Model
{
	protected $fillable = [
		'patient_name','patient_email','gender','blood_group'
	];
    use HasFactory;
	
	function report(){
		return $this->hasMany(Report::class);
	}
	function hospital(){
		return $this->belongsToMany(Hospital::class);
	}
	
}
