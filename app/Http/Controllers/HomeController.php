<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\Report;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    function hospital(){
		return Hospital::all();
	}
	function patient(){
		return Patient::all();
	}
    function report(){
		return Report::all();
	}
	
	function patient_reports(Request $request){
		$data1 = Patient::all();
		$data2 = Report::all();
		
		$mergedata = $data1->merge($data2);
		return $mergedata;
	}
	function hospital_reports(){
		$data1 = Hospital::all();
		$data2 = Report::all();
		
		$mergedata = $data1->merge($data2);
		return $mergedata;
	}
	
	function patient_report(Request $request){
		$data = Patient::where('patient_name',$request->name)
						->with('report')
						->get();
		return $data;
	}
	/*
	$articles =DB::table('articles')
                ->join('categories', 'articles.id', '=', 'categories.id')
                ->join('users', 'users.id', '=', 'articles.user_id')
                ->select('articles.id','articles.title','articles.body','users.username', 'category.name')
                ->get();
	
	$usersDetails = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')// joining the contacts table , where user_id and contact_user_id are same
            ->select('users.*', 'contacts.phone')
            ->get();
	
	$ordersWithUsers = DB::table('orders')
    ->rightJoin('users', 'users.id', '=', 'orders.user_id')
    ->select('users.name', 'orders.order_date')
    ->get();
	
	
	
		$data = array(Hospital::where('id',$id)->get()->all());
		$data1 = array(Report::where('hospital_id',$id)->get()->all());
		$mergedata = $data->merge($data1);
		return $mergedata;
		

					   
		$mergedata = Hospital::with('reports')->find($id);
		return $mergedata;
		
		$mergedata = Hospital::where('id',$request->id)
					   ->join('reports','hospitals.id','=','reports.hospital_id')
					   ->select('hospitals.id','hospitals.hospital_name','hospitals.hospital_email',
					   'reports.patient_name','reports.report')
					   ->get();
		return $mergedata;
		
	function hospital_report(Request $request){
		$mergedata = Hospital::with('report')->get();
		return $mergedata;
					
	}
	
	*/
	
	function hospital_report(Request $request){
		$mergedata = Hospital::with('report')->where('id',$request->id)->get();
		return $mergedata;
					
	}
}
