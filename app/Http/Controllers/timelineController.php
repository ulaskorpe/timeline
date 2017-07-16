<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Models\Event;
use App\Http\Models\Temp;
use Carbon\Carbon;
class timelineController extends Controller
{

	//04/11/2013 14:00
//2017-07-11 12:01:00
	public function tarihYap($deger){
		$aylar=array('Jan'=>'01','Feb'=>'02','Mar'=>'03','Apr'=>'04','May'=>'05','Jun'=>'06','Jul'=>'07','Aug'=>'08','Sep'=>'09','Oct'=>'10','Nov'=>'11','Dec'=>'12');
		//Thu Jul 13 2017 03:10:00 GMT+0300  // 2017-07-16 15:53:14
		$dizi= explode(" ",$deger);
		//$diziTarih=explode("-",$dizi[0]);
		//$diziSaat=explode(":",$dizi[1]);
		return $dizi[3].'-'.$aylar[$dizi[1]].'-'.$dizi[2].' '.$dizi[4];
	}

    public function index(){
    	Session::put('sayfa',5);
    	$events=Event::where('id','>',0)->get();
    
    	return view('timeline',array('events'=>$events));
    }

    public function tarihKaydet(Request $gelenler){
			$start_date=$this->tarihYap($gelenler->start_date);
		//$start_date=Carbon::parse($gelenler->input('start_date'))->format('Y-m-d');
		///$start_date= Carbon::createFromFormat('Y-m-d', $request->$gelenler->input('start_date'));//$gelenler->input('start_date');
    	///Object { start_date: Date 2017-07-12T07:50:00.000Z, end_date: Date 2017-07-12T10:20:00.000Z, text: "vfggfg", id: 1500212849900, _timed: true, _sday: 2, _inner: false, _sorder: 0, _count: 1, ex: "added" }
	   		if($gelenler->input('ex')=='added'){
	   			 
	   			if( $start_date < Carbon::now()){
	   				return ['msg'=>'date cant be before NOW','hata'=>true];
	   			}

    		}else if($gelenler->input('ex')=='changed'){

			}else if($gelenler->input('ex')=='updated'){

			}    			
			//dd($gelenler->all());
			return [ 'msg'=>'input'.$start_date.' :carbon '.Carbon::now(),'hata'=>false];

    }
}
