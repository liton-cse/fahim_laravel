<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
	protected $fillable = [
		'patient_name','report'
	];
    use HasFactory;
	
	function hospital(){
		return $this->belongsTo(Hospital::class);
	}
	
	function patient(){
		return $this->belongsTo(Patient::class);
	}
	
}
