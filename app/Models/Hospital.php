<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;
use App\Models\Report;


class Hospital extends Model
{
		
	protected $fillable = [
		'hospital_name','hospital_email'
	];
    use HasFactory;
	
	function patient(){
		
		return $this->hasMany(Patient::class);
	}
	
	function report(){
		return $this->hasMany(Report::class);
	}
	
	
	
}
