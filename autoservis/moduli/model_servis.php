<h3>Odaberite godinu i kvartal:</h3> <br>
<select id='dat' onchange="getNewTable();">
	<option value="2016-01-01;2016-03-31">1. kvartal 2016. godine</option>
	<option value="2016-04-01;2016-06-31">2. kvartal 2016. godine</option>
	<option value="2016-07-01;2016-09-30">3. kvartal 2016. godine</option>
	<option value="2016-10-01;2016-12-31">4. kvartal 2016. godine</option>
	<option value="2017-01-01;2017-03-31">1. kvartal 2017. godine</option>
	<option value="2017-04-01;2017-06-31">2. kvartal 2017. godine</option>
	<option value="2017-07-01;2017-09-30">3. kvartal 2017. godine</option>
	<option value="2017-10-01;2017-12-31">4. kvartal 2017. godine</option>
	<option value="2018-01-01;2018-03-31">1. kvartal 2018. godine</option>
	<option value="2018-04-01;2018-06-31">2. kvartal 2018. godine</option>
	<option value="2018-07-01;2018-09-30">3. kvartal 2018. godine</option>
	<option value="2018-10-01;2018-12-31">4. kvartal 2018. godine</option>
	
</select>
<div id="rezultat"></div>

<script>
	function getNewTable() {
		$.post(
			'http://localhost/nesto/index.php?stranica=model_servis_api',
			{ 'dat' : $('#dat option:selected').val() },
			function(html) {
				console.log(html);
				$('#rezultat').html(html);
			}
		);
	}
	
	$(getNewTable);
</script>
