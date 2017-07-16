<?php 
require_once("connector/scheduler_connector.php");
 
$res=mysql_connect("localhost","root","");
mysql_select_db("orange_DB");
 
/*try {
$res = new PDO('mysql:host=localhost;dbname=orange_DB','root','');
    $res->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  print "Hata!: " . $e->getMessage();
  die();  
}*/

$conn = new SchedulerConnector($res);
 
$conn->render_table("events","id","start_date,end_date,text");

//var_dump($conn);
?>