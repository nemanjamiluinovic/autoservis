<?php  
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit ="select usluga.naziv as naj_usluga,
count(usluga.naziv) as broj
from usluga inner join servis_usluga on usluga.usluga_id=servis_usluga.usluga_id
inner join servis on servis.servis_id=servis_usluga.servis_id
where end_at like '2018-12%' group by naj_usluga ORDER BY broj DESC;";
$data=$db->fetchData($upit);
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Make Simple Pie Chart by Google Chart API with PHP Mysql</title>  
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
                      title: 'Percentage of Male and Female Employee',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px;">  
                <h3 align="center">Make Simple Pie Chart by Google Chart API with PHP Mysql</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
      </body>  
 </html>  