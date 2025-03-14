<?php
function pDump($variable){
echo "<pre>";
echo "<code>";
var_dump ($variable);
echo"</pre>";
echo "</code>";

}

$prueba2 = json_encode([0 => "Gato", 1=>"Perro", 2=> "Caballo"]);
pDump ($prueba2);
echo "prueba2<br>";
$prueba3 = json_encode(["Anmal" => "Gato", "Animal2" => "Perro", "Animal3" => "caballo"]);
pDump($prueba3);
echo "prueba3<br>";

$prueba4 = json_encode(["Gato"=>true, "Perro"=> 6, "Caballo"=>null, "Otro" =>["Gato", "Perro", "Caballo"]]);
pDump ($prueba4);
echo "prueba4<br>";

class user
{
  public $nombre = "Òscar";
    public $apellidod = "Peñolillos";
  public $direccion = "Mi calle";
  public $poblacion = "Ullastrell";

}
$user = new User();
$printUser = json_encode($user);
pDump($printUser);
echo "$printUser<br>";

//json_decode() para convertir texto en còdigo php 
$string = '{"0":"Isidro", "1":"Pepe"}';

$resul = json_decode($string);
pDump($resul);

foreach ($resul as $key => $value) {
echo "$key = $value<br/>";}

$str2 = '[{"0":"Isidro", "1":"Pepe", "2":"otroNombre"}]';
$resul2 = json_decode($str2, true);
pDump($resul2);

/* foreach ($resul2 as $key => $value) {
echo "$key = $value<br/>";}
 */

$temps = '{
   "coord": {
      "lon": 7.367,
      "lat": 45.133
   },
   "weather": [
      {
         "id": 501,
         "main": "Rain",
         "description": "moderate rain",
         "icon": "10d"
      }
   ],
   "base": "stations",
   "main": {
      "temp": 284.2,
      "feels_like": 282.93,
      "temp_min": 283.06,
      "temp_max": 286.82,
      "pressure": 1021,
      "humidity": 60,
      "sea_level": 1021,
      "grnd_level": 910
   },
   "visibility": 10000,
   "wind": {
      "speed": 4.09,
      "deg": 121,
      "gust": 3.47
   },
   "rain": {
      "1h": 2.73
   },
   "clouds": {
      "all": 83
   },
   "dt": 1726660758,
   "sys": {
      "type": 1,
      "id": 6736,
      "country": "IT",
      "sunrise": 1726636384,
      "sunset": 1726680975
   },
   "timezone": 7200,
   "id": 3165523,
   "name": "Province of Turin",
   "cod": 200
}';
$temps_decoded = json_decode($temps, true);
pDump($temps_decoded);                     