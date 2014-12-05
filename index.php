<html>
<head>
  <link href="asset/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="asset/css/navbar-fixed-top.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="asset/js/bootstrap.js"> </script> 
</head>
<body>

  <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Aziz Akhmad Wardoyo</a>
        </div>
        <div class="navbar-collapse collapse">
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<?php
		require_once('nusoap/lib/nusoap.php');
		$url = 'http://wsf.cdyne.com/WeatherWS/Weather.asmx?wsdl';
		$client = new nusoap_client($url, 'WSDL');
		$result = $client->call('GetWeatherInformation');
	?>
	
      <table class="table table-bordered">
          <tr>
            <td>ID</td>
            <td>Weather</td>
            <td>Picture</td>
          </tr>
            <?php foreach ($result['GetWeatherInformationResult']['WeatherDescription'] as $weather){
				echo "<tr>";
					echo "<td>".$weather['WeatherID']."</td>";
					echo "<td>".$weather['Description']."</td>";
					echo "<td> <img src='".$weather['PictureURL']."'></td>";
				echo "</tr>";
				}
			?>
        </table>

</body>
</html>