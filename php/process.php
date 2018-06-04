<!DOCTYPE html>
<html lang="en" ng-app>
<head>
  <meta charset="UTF-8">
  <title>Conversor</title>
  <script src="angular.min.js"></script>
</head>
<body>
  <form action="php/process.php" method="post">
  <label for="postcode1">Código Postal #1</label>
  <input type="text" id="etc" ng-model="cp1" name="postcode1">
  <br>
  <label for="postcode2">Código Postal #2</label>
  <input type="text" id="etc" ng-model="cp2" name="postcode2">
  <br>
  <button type="button" name="button" onclick="location.href='../';">Volver</button>
  </form>
</body>
</html>

  <?php
  include '../vendor/autoload.php';
  use GuzzleHttp\Client;

  $cp1 = $_POST['postcode1'];
  $cp2 = $_POST['postcode2'];

    $client = new Client([
      'base_uri' => 'https://api-codigos-postales.herokuapp.com/v2/',
    ]);
    // Json Response
    $response_cp1 = $client->request('GET','codigo_postal/'.$cp1);
    $response_cp2 = $client->request('GET','codigo_postal/'.$cp2);
    // PHP Object Response
    $response_cp1_object = json_decode($response_cp1->getBody());
    $response_cp2_object = json_decode($response_cp2->getBody());

    /*   DISTANCE */

    $client_dis = new Client([
      'base_uri' => 'https://maps.googleapis.com/maps/api/distancematrix/',
    ]);
    //Json Response
    $tourl_string_municipio_1 = str_replace('', '+', $response_cp1_object->municipio);
    $tourl_string_estado_1 = str_replace('', '+', $response_cp1_object->estado);

    $tourl_string_municipio_2 = str_replace('', '+', $response_cp2_object->municipio);
    $tourl_string_estado_2 = str_replace('', '+', $response_cp2_object->estado);
    $response_dis = $client_dis->request('GET','json?units=imperial&origins='.$tourl_string_municipio_1.','.$tourl_string_estado_1.',México&destinations='.$tourl_string_municipio_2.','.$tourl_string_estado_2.',México&key=AIzaSyBpLNDhRQgBSlfzn7SJwZyfjyGEv-WIrrE');
    $decode_json_dis = json_decode($response_dis->getBody());

    echo "<br>Distancia: ".$decode_json_dis->rows[0]->elements[0]->distance->text."<br>";
    echo "<br>Tiempo: ".$decode_json_dis->rows[0]->elements[0]->duration->text."<br>";
    /*echo '<ul>
        <li>Código Postal: '.$response_cp1_object->codigo_postal.'</li>
        <li>Municipio: '.$response_cp1_object->municipio.'</li>
        <li>Estado: '.$response_cp1_object->estado.'</li>';
        foreach ($response_cp1_object->colonias as $key) {
          echo '<li>Colonias: '.$key.'</li>
          </ul>';
        }*/
        /*echo '<ul>
        <li>Código Postal: '.$response_cp2_object->codigo_postal.'</li>
        <li>Municipio: '.$response_cp2_object->municipio.'</li>
        <li>Estado: '.$response_cp2_object->estado.'</li>';
        foreach ($response_cp2_object->colonias as $key) {
          echo '<li>Colonias: '.$key.'</li>
        </ul>';
      }*/

 ?>
</body>
</html>
