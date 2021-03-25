
function proizvodjacValue(val){
	
	$.ajax({
		type:"POST",
		url:"moduli/druga.php",
		data:"proizvodjac_id="+val,
		success:function(data){
			$("#model").html(data);
		}
	});
}