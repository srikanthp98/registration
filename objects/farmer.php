<?php
class Farmer{
  // database connection and table name
  private $conn;
  private $table_name = "farmer";
 
  // object properties
  public $id;
  public $firstname;
  public $lastname;
  public $father;
  public $email;
  public $mobile;
  public $village;
  public $mandal;
  public $district;
  public $state;
  public $pincode;
  public $crop1;
  public $crop2;
  public $crop3;
 
  public function __construct($db){
    $this->conn = $db;
  }
 
  // create product
  function create(){

    //write query
    $query = "INSERT INTO " . $this->table_name . " SET firstname=:firstname, lastname=:lastname, father=:father, email=:email, mobile=:mobile, village=:village, mandal=:mandal, district=:district, state=:state, pincode=:pincode, crop1=:crop1, crop2=:crop2, crop3=:crop3";

    $stmt = $this->conn->prepare($query);

    // posted values
    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
    $this->father=htmlspecialchars(strip_tags($this->father));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->mobile=htmlspecialchars(strip_tags($this->mobile));
    $this->village=htmlspecialchars(strip_tags($this->village));
    $this->mandal=htmlspecialchars(strip_tags($this->mandal));
    $this->district=htmlspecialchars(strip_tags($this->district));
    $this->state=htmlspecialchars(strip_tags($this->state));
    $this->pincode=htmlspecialchars(strip_tags($this->pincode));
    $this->crop1=htmlspecialchars(strip_tags($this->crop1));
    $this->crop2=htmlspecialchars(strip_tags($this->crop2))
    $this->crop3=htmlspecialchars(strip_tags($this->crop3))

    // bind values 
    $stmt->bindParam(":firstname", $this->firstname);
    $stmt->bindParam(":lastname", $this->lastname);
    $stmt->bindParam(":father", $this->father);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":mobile", $this->mobile);
    $stmt->bindParam(":village", $this->village);
    $stmt->bindParam(":mandal", $this->mandal);
    $stmt->bindParam(":district", $this->district);
    $stmt->bindParam(":state", $this->state);
    $stmt->bindParam(":pincode", $this->pincode);
    $stmt->bindParam(":crop1", $this->crop1);
    $stmt->bindParam(":crop2", $this->crop2);
    $stmt->bindParam(":crop3", $this->crop3);

    if($stmt->execute()){
      return true;
    }else{
      print_r($stmt->errorInfo());exit;
      return false;
    }
  } 
}
?>
