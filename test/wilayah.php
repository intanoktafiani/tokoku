<html>
	<head>
	</head>
	<body>
		<select id="provinsi">
			<option>SULAWESI UTARA</option>
			<option>SUMATERA UTARA</option>
		</select>
		<select id="kabupaten"></select>
		<select id="kecamatan"></select>
		
		<script type="text/javascript">
			var host = "http://localhost/tokoku/api/v1/wilayah";
			document.body.addEventListener("load", function(event){
				document.getElementById("kabupaten").innerHtml = "<option>MANADO</option>";
				console.log(document.getElementById("kabupaten").innerHtml);
			});

			document.getElementById("provinsi").addEventListener("change", function(event){
				var provinsi = document.getElementById("provinsi").value;
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var json = JSON.parse(this.responseText);
						var i;
						var html = "";
						for (i = 0; i < json.length; i++) {
							html += "<option>" + json[i].namaKotaKabupaten + "</option>";
						}
						
						var t=document.getElementById("test");
						t.value="anak ayam";
						//console.log(document.getElementById("test").innerHtml);
					}
				};
				
				xhttp.open("GET", host + "/kabupaten/" + provinsi, true);
				xhttp.send();
			}, false);
		</script>
		
		<div id="test">TEST</div>
	</body>
</html>
