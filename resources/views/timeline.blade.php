@extends('index')

@section('goster')




<div class="container">

 
 
<div class="panel-heading"><h3>Timeline</h3></div>
 
<form id="xml_form" action="xml_writer.php" method="post" target="hidden_frame" >
    <input type="text" name="data" value="" id="data">
</form>

<input type="button" name="save" value="save" onclick="save()" >
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

function save(){
    var form = document.getElementById("xml_form");
    form.elements.data.value = scheduler.toJSON();
   // form.submit();
}

		function init(){
		//alert(new Date());
		scheduler.config.xml_date="%Y-%m-%d %H:%i";
	scheduler.init('scheduler_here', '<?=date('Y-m-d')?>',"week");
	///scheduler.setImagePath("{{asset('images/imgs_dhx_terrace')}}");
var json_string = scheduler.toJSON();

var events = [
/*{id:1, text:"Meeting",   start_date:"04/11/2013 14:00",end_date:"04/11/2013 17:00"},
{id:2, text:"Conference",start_date:"04/10/2013 12:00",end_date:"04/10/2013 19:00"},*/
@foreach($events as $event)
{id:{{$event->id}}, text:"{{$event->text}}",   start_date:"{{$event->start_date}}",end_date:"{{$event->end_date}}"},
@endforeach

];
 
scheduler.parse(events, "json");//takes the name and format of the data source
scheduler.attachEvent("onEventChanged", function(id,ev){
   // alert(json_string);
    $.post("{{route('tarihKaydet')}}",{name:'ulaş',lname:'körpe'},function(data){
			alert(data);
   });
   
});
/*
var events = [
@foreach($events as $event)
{id:{{$event->id}}, text:"{{$event->text}}",   start_date:"{{$event->start_date}}",end_date:"{{$event->end_date}}"},
@endforeach

{id:111, text:"Interview", start_date:"04/14/2013 09:00",end_date:"04/14/2013 10:00"}
];
 
scheduler.parse(events, "json");//takes the name and format of the data source*/
//alert(scheduler.load("connector.php","xml"));

//scheduler.config.icons_select = ["icon_details"];
//scheduler.config.xml_date="%Y-%m-%d %H:%i";
var dp = new dataProcessor("connector.php");
dp.init(scheduler);
	}
</script>
  

    <script>
    $( document ).ready(function() {
   
init();

    });
 
    
    </script>
 

