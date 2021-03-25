$(document).ready(function(){
	$.ajax({
		url:"http://localhost/nesto/moduli/podaci.php",
		method: "GET",
		success: function(data){
			console.log(data);
			
			
			
		},
		error:function(data){
			console.log(data);
			
		}
		
	});
	
	
});
 