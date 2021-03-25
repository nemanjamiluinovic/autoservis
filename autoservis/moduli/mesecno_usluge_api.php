

<?php
ob_clean();
if($_POST){
	$god = filter_input(INPUT_POST, 'god', FILTER_SANITIZE_STRING);
	$mesec = filter_input(INPUT_POST, 'mesec', FILTER_SANITIZE_STRING);

 if (!preg_match('/^2[0-9]{3}$/', $god)) {
	 die('Illegal API call! You will be reported! Your IP address has been logged.');
 }

if (!preg_match('/^-[0-1]{1}[0-9]{1}/', $mesec)) {

	 die('Illegal API call! You will be reported! Your IP address has been logged.');
 }

$sqlQueryPart = $god . $mesec;

 
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit ="select usluga.naziv as naj_usluga,
count(usluga.naziv) as broj
from usluga inner join servis_usluga on usluga.usluga_id=servis_usluga.usluga_id
inner join servis on servis.servis_id=servis_usluga.servis_id
where end_at like'".$sqlQueryPart."%' group by naj_usluga ORDER BY broj DESC;";
$data=$db->fetchData($upit);
 ?>  
  
        
          
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Usluga', 'Broj'],  
                          <?php  
                         foreach($data as $v)
                          {  
                               echo "['".$v["naj_usluga"]."', ".$v["broj"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      
                       
                     };  
                var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      
           <br /><br />  
           <div id='pita' style="width:900px;">  
                <h3 align="center">	Procenat izvršenih usluga u <?php echo date('Y-m', strtotime($sqlQueryPart)); ?></h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
   


<?php } exit;?>
