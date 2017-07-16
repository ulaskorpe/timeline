<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Models\Event;
class timelineController extends Controller
{

	//04/11/2013 14:00
//2017-07-11 12:01:00
	public function tarihYap($deger){
		$dizi= explode(" ",$deger);
		$diziTarih=explode("-",$dizi[0]);
		$diziSaat=explode(":",$dizi[1]);
		return $diziTarih[1].'/'.$diziTarih[2].'/'.$diziTarih[0].' '.$diziSaat[0].':'.$diziSaat[1];
	}

    public function index(){
    	Session::put('sayfa',5);
    	$events=Event::where('id','>',0)->get();
    
    	return view('timeline',array('events'=>$events));
    }

    public function tarihKaydet(Request $gelenler){

    	//print_r($gelenler);
return "tamamdır";
    }
}
