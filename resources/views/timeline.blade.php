@extends('index')

@section('goster')


<meta name="_token" content="{{{ csrf_token() }}}"/>



<div class="container">

 

<div class="panel-heading"><h3>Timeline</h3></div>

 
<div class="alert alert-success" role="alert" id="sonuc" > </div>
 
 
<div class="alert alert-danger" role="alert" id="hata" > </div>
 


<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
    <div class="dhx_cal_navline">
        <div class="dhx_cal_prev_button">&nbsp;</div>
        <div class="dhx_cal_next_button">&nbsp;</div>
        <div class="dhx_cal_today_button"></div>
        <div class="dhx_cal_date"></div>
        
    </div>
    <div class="dhx_cal_header"></div>
    <div class="dhx_cal_data"></div>       
</div>

 
</div>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
 <script src="{{asset('js/dhtmlxscheduler.js')}}" type="text/javascript"></script>
 <script src="{{asset('js/dhtmlxscheduler_serialize.js')}}" type="text/javascript"></script>
   <link rel="stylesheet" href="{{asset('css/dhtmlxscheduler.css')}}" type="text/css">

  <script type="text/javascript" charset="utf-8">

/*function save(){
    var form = document.getElementById("xml_form");
    form.elements.data.value = scheduler.toJSON();
    $('#sonuc').html(scheduler.toJSON());
   // form.submit();
}*/

     $( document ).ready(function() {
   
		init();

		$('#hata').hide();
		$('#sonuc').hide();
/*
  $('#tikla').on('click', function (e) {
  	//alert('ok');
     //  e.preventDefault();
    
     
    });*/

    });////ready




function init(){
	//var ajax = new XMLHttpRequest();
		//alert(new Date());

var hata = false;
var msg = '';
scheduler.config.xml_date="%Y-%m-%d %H:%i";
scheduler.config.show_loading = true;
scheduler.init('scheduler_here', '<?=date('Y-m-d')?>',"week");
	///scheduler.setImagePath("{{asset('images/imgs_dhx_terrace')}}");
var json_string = scheduler.toJSON();

var events = [

@foreach($events as $event)
{id:{{$event->id}}, text:"{{$event->text}}",   start_date:"{{$event->start_date}}",end_date:"{{$event->end_date}}"},
@endforeach

];
 
scheduler.parse(events, "json");//takes the name and format of the data source

scheduler.attachEvent("onEventDeleted", function(id,ev){
		ev["ex"]='deleted';
	//console.log(ev);
   $.ajax({
        	 
            type: "GET",
            url: '{{route('tarihKaydet')}}',
            data: ev,
            success: function( response ) {
               hataGoster(response.hata,response.msg);
            }
            ,
	error: function(XMLHttpRequest, textStatus, errorThrown) {
     			alert(  'some error');
  			}
        });
	});


scheduler.attachEvent("onEventAdded", function(id,ev){
	ev["ex"]='added';
	//console.log(ev);
   $.ajax({
        	 
            type: "GET",
            url: '{{route('tarihKaydet')}}',
            data: ev,
            success: function( response ) {
               hataGoster(response.hata,response.msg);
            },

         	error: function(XMLHttpRequest, textStatus, errorThrown) {
     			alert(  'some error');
  			}
            

        });


	});

scheduler.attachEvent("onEventChanged", function(id,ev){
   // alert(json_string);
	//ev = JSON.stringify(ev);
ev["ex"]='changed';
//console.log(ev);
   $.ajax({
        	 
            type: "GET",
            url: '{{route('tarihKaydet')}}',
            data: ev,
            success: function( response ) {
                //$("#sonuc").append( response.a );
                	hataGoster(response.hata,response.msg);

            }
            ,	error: function(XMLHttpRequest, textStatus, errorThrown) {
     			alert(  'some error');
  			}

        });


   
});////event changed


function hataGoster(hata,msg){
//alert(hata+msg);
if(hata){
$('#sonuc').hide();
$('#hata').show();
$('#hata').html(msg);
}else{

$('#hata').hide();
$('#sonuc').show();
$('#sonuc').html(msg);

} 

}///hata göster
 /*
}
var dp = new dataProcessor("connector.php");
dp.init(scheduler);
*/
	}
</script>
  

    
 

