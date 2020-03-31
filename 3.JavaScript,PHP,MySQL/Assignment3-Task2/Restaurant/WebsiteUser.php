<?php
class websiteUser{
  protected static $DB_HOST="localhost:3306";
  protected static $DB_USERNAME="andressa_eatery";
  protected static $DB_PASSWORD=")B?YGVYocXoG";
  protected static $DB_DATABASE="andressa_eatery";

  private $username;
  private $password;
  public $mysqli;
  private $dbError;
  private $authenticated = false;

  function __construct(){
    $this->mysqli = new mysqli(self::$DB_HOST, self::$DB_USERNAME,
    self::$DB_PASSWORD, self::$DB_DATABASE);

    if($this->mysqli->errno){
      $this->dbError = true;
    }else{
      $this->dbError = false;
    }
  }

  public function authenticate($username, $password){
    $loginQuery = "SELECT * FROM adminusers WHERE Username = '".$username."' AND Password =  '".$password."'";

    $stmt = $this->mysqli->prepare($loginQuery);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1){
      $this->username = $username;
      $this->password = $password;
      $this->authenticated = true;
    }
    $stmt->free_result();
  }

  public function isAuthenticated(){
    return $this->authenticated;
  }

  public function hasDbError(){
    return $this->dbError;
  }

  public function getUsername(){
    return $this->username;
  }
}


?>
