@extends('index')

@section('goster')


<div class="container">
<div class="panel panel-default">
<div class="panel-heading" style="height: 50px;"></div>


<div class="panel-body">
<div class="panel-heading"><h3>Personel Dosyaları</h3></div>


<form class="form-horizontal" action="{{url('/dosyaYukle')}}" method="Post" id="upload" enctype="multipart/form-data">
	{{ csrf_field() }}


<div class="form-group">
<input type="text" name="aciklama" id="aciklama" class="form-control" maxlength="200" placeholder="Açıklama">
</div>
	<div class="form-group">
	<input type="file" name="dosyalar[]" multiple class="form-control">
	</div>
	<div class="form-group">
<select name="personel_id" id="personel_id" class="form-control">
	
<option value="">Personel Seçiniz</option>
@foreach($personel as $person)
	<option value="{{$person->id}}">{{$person->adi_soyadi}} ({{$person->getDepartman()}})  </option>
@endforeach
</select>
</div>
<input type="submit" name="yolla" value="Dosya Yükle" class="btn btn-primary">

</form>

<script type="text/javascript">
	
/*
var form = document.getElementById('upload');
var request = new XMLHttpRequest();
form.addEventListener('submit',function(e){
	e.preventDefault();
	var formData = new FormData(form);
	request.open('post','/dosyaYukle');
	request.addEventListener('load',transferComplete);
	request.send(formData);
});

function transferComplete(data){
	console.log(data.currentTarget.response);
}
*/
</script>

</div>
</div>
</div>

@endsection