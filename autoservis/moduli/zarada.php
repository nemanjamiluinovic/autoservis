<?php  
require_once 'dbConfig.php';
$db=new Dbcon();
$conn=$db->connection();
$upit ="select end_at 
from servis
where end_at is not null;";
$result=$db->fetchData($upit);
$niz_godina=[];
foreach($result as $v){
$niz= explode('-', $v['end_at'], 3);

array_push($niz_godina,$niz[0]);	
}
$niz_godina=array_unique($niz_godina);

?>  
<h2>Finansijski izveštaji za period od godinu dana po mesecima</h2>
        <div id='grafik'>  
   
            
            
                        <div>
						<form method='post' action='moduli/kreirajxml.php'>
                            <select name="year"  id="year">
							    
                                <option value="">Odaberite godinu</option>
                            <?php
							
                            foreach($niz_godina as $year)
                            {
								
                                echo '<option value="'.$year.'">'.$year.'</option>';
                            }
						
                            ?>
                            </select>
                        </div>
                  
               
                
                    <div id="chart_area" style="width: 1000px; height: 500px;"></div>
        
       
		</div>
		
		<div id='xmle'>  <input type='submit' value='Eksportuj u xml'></form></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php if (file_exists('./js/' . $_GET['stranica']. '.js')): ?>
<script>
<?php echo file_get_contents('./js/' . $_GET['stranica'] . '.js'); ?>
</script>  
<?php endif; ?>
