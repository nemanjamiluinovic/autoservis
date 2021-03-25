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
                      
                      pieHole: 0 
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  