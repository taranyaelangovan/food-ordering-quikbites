<?php
// (1) INIT
require __DIR__ . DIRECTORY_SEPARATOR . "2a-config.php";
require PATH_LIB . "2b-lib-geo.php";
$geoLib = new Geo();

// HANDLE AJAX REQUESTS
switch ($_POST['req']) {
  // (2) INVALID REQUEST
  default:
    echo json_encode([
      "status" => 0,
      "message" => "Invalid request"
    ]);
    break;

  // (3) GET COUNTRIES
  case "country":
    $countries = $geoLib->getCountries();
    echo json_encode([
      "status" => $countries==false ? 0 : 1,
      "message" => $countries
    ]);
    break;

  // (4) GET STATES
  case "state":
    $states = $geoLib->getStates($_POST['country']);
    echo json_encode([
      "status" => $states==false ? 0 : 1,
      "message" => $states
    ]);
    break;

  // (5) GET CITIES
  case "city":
    $cities = $geoLib->getCities($_POST['country'], $_POST['state']);
    echo json_encode([
      "status" => $cities==false ? 0 : 1,
      "message" => $cities
    ]);
    break;
}
?>