<html>
<head>
   <title>How to start</title>
   <script src="js/dhtmlxscheduler.js" type="text/javascript"></script>
   <link rel="stylesheet" href="css/dhtmlxscheduler.css" type="text/css">
   <style type="text/css" media="screen">
    html, body{
        margin:0px;
        padding:0px;
        height:100%;
        overflow:hidden;
    }   
</style>
<script type="text/javascript">
	function init(){
		//alert(new Date());
	scheduler.init('scheduler_here', '<?=date('Y-m-d')?>',"week");
/*
var events = [
{id:1, text:"Meeting",   start_date:"04/09/2013 14:00",end_date:"04/09/2013 17:00"},
{id:2, text:"Conference",start_date:"04/13/2013 12:00",end_date:"04/13/2013 19:00"},
{id:3, text:"Interview", start_date:"04/14/2013 09:00",end_date:"04/14/2013 10:00"}
];
 
scheduler.parse(events, "json");//takes the name and format of the data source*/
//alert(scheduler.load("connector.php","xml"));
scheduler.load("connector.php",function(){
    alert("Data has been successfully loaded");
});
//scheduler.config.xml_date="%Y-%m-%d %H:%i";
var dp = new dataProcessor("connector.php");
dp.init(scheduler);
	}
</script>
</head>
<body onload="init();">
 

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

</body>
</html>