<?php
class Geo {
  /* [DATABASE HELPER FUNCTIONS] */
  protected $pdo = null;
  protected $stmt = null;
  public $error = "";
  public $lastID = null;

  function __construct() {
  // __construct() : connect to the database
  // PARAM : DB_HOST, DB_CHARSET, DB_NAME, DB_USER, DB_PASSWORD

    // ATTEMPT CONNECT
    try {
      $str = "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET;
      if (defined('DB_NAME')) { $str .= ";dbname=" . DB_NAME; }
      $this->pdo = new PDO(
        $str, DB_USER, DB_PASSWORD, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false
        ]
      );
      return true;
    }

    // ERROR - DO SOMETHING HERE
    // THROW ERROR MESSAGE OR SOMETHING
    catch (Exception $ex) {
      print_r($ex);
      die();
    }
  }

  function __destruct() {
  // __destruct() : close connection when done

    if ($this->stmt !== null) { $this->stmt = null; }
    if ($this->pdo !== null) { $this->pdo = null; }
  }
  
  function fetchAll ($sql, $cond=null, $key=null, $value=null) {
  // fetchAll() : perform select query (multiple rows expected)
  // PARAM $sql : SQL query
  //       $cond : array of conditions
  //       $key : sort in this $key=>data order, optional
  //       $value : $key must be provided. If string provided, sort in $key=>$value order. If function provided, will be a custom sort.

    $result = [];
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
      // Sort in given order
      if (isset($key)) {
        if (isset($value)) {
          if (is_callable($value)) {
            while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
              $result[$row[$key]] = $value($row);
            }
          } else {
            while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
              $result[$row[$key]] = $row[$value];
            }
          }
        } else {
          while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
            $result[$row[$key]] = $row;
          }
        }
      }
      // No key-value sort order
      else {
        $result = $this->stmt->fetchAll();
      }
    } catch (Exception $ex) {
      $this->error = $ex;
      return false;
    }
    // Return result
    $this->stmt = null;
    return count($result)==0 ? false : $result ;
  }
  
  function fetchCol ($sql, $cond=null) {
  // fetchCol() : yet another version of fetch that returns a flat array
  // I.E. Good for one column SELECT `col` FROM `table`

    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute($cond);
    $result = $this->stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    return count($result)==0 ? false : $result;
  }
  
  /* [GEO FUNCTIONS] */
  function getCountries () {
  // getCountries() : get all countries

    $sql = "SELECT * FROM `cities` ORDER BY `city_name`";
    return $this->fetchAll($sql, null, "city_id", "city_name");
  }

  function getStates ($country) {
  // getStates() : get states of given country
  // PARAM $country : country code

    $sql = "SELECT * FROM `areas` WHERE `city_id`=? ORDER BY `area_name`";
    return $this->fetchAll($sql, [$country], "area_id", "area_name");
  }

  function getCities ($country, $state) {
  // getCities() : get cities of given country and state
  // PARAM $country : country code  
  //       $state : state code

    $sql = "SELECT `place_name` FROM `places` WHERE `city_id`=? AND `area_id`=? ORDER BY `place_name`";
    return $this->fetchCol($sql, [$country, $state]);
  }
}
?>