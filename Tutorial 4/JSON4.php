<meta charset="UTF-8">

<form method="get" action="">
    <label>
        Ciudad
    </label>
    <input type = "text" name="c">
    <input type = "submit" value="Mostrar el Tiempo">
</form>
<?php 

if($_GET["c"]==null) die();

$html = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$_GET["c"]);

$json = json_decode($html);

$ciudad = $json->name;
$lat = $json->coord->lat;
$lon = $json->coord->lon;
$temp = $json->main->temp;
$tempmax = $json->main->temp_max;
$tempmin = $json->main->temp_min;
$presion = $json->main->pressure;
$humedad = $json->main->humidity;
$vel_viento = $json->main->temp;
$estado_cielo = $json->weather[0]->main;
$descripcion = $json->weather[0]->description;

echo "<h3>Ciudad: ".$ciudad." [lat = ".$lat. ", lon = ".$lon. " ]</h3>";
echo "<b>Estado del cielo: </b>".$estado_cielo."<br>";
echo "<b>Descripción: </b>".$descripcion."<br>";
echo "<br>";
echo "<b>Temperatura: </b>".$temp." K [Máx: ".$tempmax."K, Mín: ".$tempmin."K]<br>";
echo "<b>Presión: </b>".$presion."<br>";
echo "<b>Humedad: </b>".$humedad."<br>";
echo "<br><br><br><br><br>";  
?>