
       <?php
	session_start();
createXMLfile($_SESSION['niz']);


 function createXMLfile($niz){
  
   $filePath = 'zarada.xml';

   $dom     = new DOMDocument('1.0', 'utf-8'); 

   $root      = $dom->createElement('zarada'); 

   for($i=0; $i<count($_SESSION['niz']); $i++){
	
		$mesec=$_SESSION['niz'][$i]['month'];  

        $profit=$_SESSION['niz'][$i]['profit'];

 
		
		 $zarada = $dom->createElement('mesecni_nivo');
	


     $mes=$dom->createElement('mesec',$mesec);

     $prof=$dom->createElement('profit', $profit); 

     $zarada->appendChild($mes); 
     $zarada->appendChild($prof); 
 
     $root->appendChild($zarada);
        
    }

     
     

   

   $dom->appendChild($root); 

   $dom->save($filePath); 

 } 
 
 header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="zarada.xml"');

 ?>
      
   

