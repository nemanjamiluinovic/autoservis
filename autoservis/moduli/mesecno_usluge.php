
<div id='dm'>


<h3>
Odaberite godinu:</h3>
<select id='god'>
<option  value="2016">2016. </option>
<option value="2017">2017.</option>
<option value="2018">2018. </option>
</select><br> <br>
<h3>
Odaberite mesec:</h3> 
<select id='mesec'>
<option  value="-01">Januar </option>
<option value="-02">Februar</option>
<option value="-03">Mart </option>
<option value="-04">April </option>
<option value="-05">Maj</option>
<option value="-06">Jun </option>
<option value="-07">Jul</option>
<option value="-08">Avgust</option>
<option value="-09">Septembar </option>
<option value="-10">Oktobar </option>
<option value="-11">Novembar</option>
<option value="-12">Decembar </option>

</select><br><br>
<input type='button' value='Potvrdi'onclick='posalji();'>

</div>
<div id='grafik'> </div>

<script>
	
	function posalji() {
		$.post(
			'http://localhost/nesto/index.php?stranica=mesecno_usluge_api',
			{ 'god' : $('#god option:selected').val(),'mesec': $('#mesec option:selected').val()  },
			function(html) {
				console.log(html);
				$('#grafik').html(html);
			}
		);
	}
	
</script>
