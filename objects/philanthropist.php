<?php
class Philanthropist{
  // database connection and table name
  private $conn;
  private $table_name = "philanthropist";
 
  // object properties
  public $id;
  public $fullname;
  public $lastname;
  public $email;
  public $phone;
  public $address;
  public $village;
  public $mandal;
  public $district;
  public $occupation;
  public $charity_event;
  public $police_station;
  public $registered_date;
 
  public function __construct($db){
    $this->conn = $db;
  }
 
  // create product
  function create(){

    //write query
    $query = "INSERT INTO " . $this->table_name . " SET fullname=:fullname, lastname=:lastname, phone=:phone, email=:email, address=:address, village=:village, mandal=:mandal, district=:district, occupation=:occupation, charity_event=:charity_event, police_station=:police_station, registered_date=:registered_date";

    $stmt = $this->conn->prepare($query);

    // posted values
    $this->fullname=htmlspecialchars(strip_tags($this->fullname));
    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
    $this->phone=htmlspecialchars(strip_tags($this->phone));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->address=htmlspecialchars(strip_tags($this->address));
    $this->village=htmlspecialchars(strip_tags($this->village));
    $this->mandal=htmlspecialchars(strip_tags($this->mandal));
    $this->district=htmlspecialchars(strip_tags($this->district));
    $this->occupation=htmlspecialchars(strip_tags($this->occupation));
    $this->charity_event=htmlspecialchars(strip_tags($this->charity_event));
    $this->police_station=htmlspecialchars(strip_tags($this->police_station));
    $this->registered_date=date('Y-m-d H:i:s');

    // bind values 
    $stmt->bindParam(":fullname", $this->fullname);
    $stmt->bindParam(":lastname", $this->lastname);
    $stmt->bindParam(":phone", $this->phone);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":address", $this->address);
    $stmt->bindParam(":village", $this->village);
    $stmt->bindParam(":mandal", $this->mandal);
    $stmt->bindParam(":district", $this->district);
    $stmt->bindParam(":occupation", $this->occupation);
    $stmt->bindParam(":charity_event", $this->charity_event);
    $stmt->bindParam(":police_station", $this->police_station);
    $stmt->bindParam(":registered_date", $this->registered_date);

    if($stmt->execute()){
      return true;
    }else{
      print_r($stmt->errorInfo());exit;
      return false;
    }
  } 
}
?>
