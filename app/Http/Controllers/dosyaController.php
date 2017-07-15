<?php

namespace App\Http\Controllers;
use Storage;
use Illuminate\Http\Request;
use Session;
use App\Http\Models\Personel;
use App\Http\Models\Dosya;
class dosyaController extends Controller
{
  public function dosyalar(){
  	Session::put('sayfa',3);
  	$personel= Personel::whereRaw('id!=?',array(0))->orderBy('giris_tarihi')->get();

  	return view('dosyalar',array('personel'=>$personel));
  }

  public function dosyaYukle(Request $gelenler){
  	$personel_id=$gelenler->input('personel_id');

  	//print_r($gelenler->all());
  	$files = $gelenler->file('dosyalar');
  	if(!empty($files)){

  		foreach($files as $file){

  			Dosya::insert([
    				['aciklama' => $gelenler->input('aciklama'), 'dosya' => $file->getClientOriginalName(),'personel_id'=>$personel_id]
   
				]);

  			Storage::put($file->getClientOriginalName(),file_get_contents($file));
  		}
  	}

  }


}
