
function load_monthwise_data(kvarisa, title)
{
    var temp_title = title + ' '+kvarisa+'';
    $.ajax({
        url:"http://localhost/nesto/moduli/spisak_usluga.php",
        method:"POST",
        data:{kvarisa:kvarisa},
		dataType:"json",
        success:function(data) {
			$("#u").html(function(){
				var jsonData = data;
				$("#u").html('');

				$.each(jsonData, function(i, item){
					$("#u").append(
						$('<p>').html(item.usluga + ' - ' + item.broj + ' puta izvršeno').css({display: 'none'})
					);
				});
				
				$("#u p").delay(100).fadeIn(400);
			});
        }
    });
}



$(document).ready(function(){

    $('#kvarisa').change(function(){
        var kvarisa = $(this).val();
        if(kvarisa != '')
        {
            load_monthwise_data(kvarisa, 'Vozilo');
        }
    });

});


