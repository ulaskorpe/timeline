<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Auth;
use App\Http\Models\Personel;

class UserController extends Controller
{
 public function __construct(){
  	$this->middleware('auth');
	}


public function login(){
if (!Auth::check()){
		return redirect()->route('giris');
	}
}



public function profil(){
		Session::put('sayfa',0);
	    return view('layouts.profil');
  }
public function profilUpdate(Request $gelenler){
	Session::put('sayfa',0);
	return $gelenler->input('email').":".$gelenler->input('name');

} 

public function profilSifre(Request $gelenler){

$person=Person::find(Auth::id());

	echo "<script>alert('".$person->email."sifreniz güncellendi');</script>";
	Session::put('sayfa',0);
	return $gelenler->input('eski_sifre').":".$gelenler->input('sifre').":".$gelenler->input('sifre_yeniden');

} 

}
