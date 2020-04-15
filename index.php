<?php

// include database and object files
include_once 'config/database.php';
include_once 'objects/philanthropist.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$philanthropist = new Philanthropist($db);

// set page headers
include_once "header.php";

?>

<?php
// if the form was submitted
if($_POST){
 
  // set product property values
  $philanthropist->fullname = $_POST['fullname'];
  $philanthropist->lastname = $_POST['lastname'];
  $philanthropist->phone = $_POST['phone'];
  $philanthropist->email = ($_POST['email'])??null;
  $philanthropist->address = ($_POST['address'])??null;
  $philanthropist->village = $_POST['village'];
  $philanthropist->mandal = $_POST['mandal'];
  $philanthropist->district = $_POST['district'];
  $philanthropist->occupation = ($_POST['occupation'])??null;
  $philanthropist->charity_event = ($_POST['charity_event'])??null;
  $philanthropist->police_station = ($_POST['police_station'])??null;
 
  // create the product
  if($philanthropist->create()){
    echo "<div class='alert alert-success'>Thank You For Your Interest!.</div>";
  } 
  // if unable to create the product, tell the user
  else{
    echo "<div class='alert alert-danger'>Error! Please Contact The Concern Person!.</div>";
  }
  exit();
}
?>

<!-- Register --> 
<div class="register">
  <div id="response"></div>
  <div class="row">
    <div class="col-md-3 register-left">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR5SdjnWNgoBQUGvfxdBC3kCgwEjdmgp4yh4P8OJx0l2BSTAIe5&usqp=CAU" alt=""/>
      <h3>Namaskaram</h3>
      <p>A man's true wealth is the good he does in this world!</p>
    </div>
    <div class="col-md-9 register-right">
      <form name="register" id="register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="profile-tab">
            <h3  class="register-heading">Register here</h3>
            <div class="row register-form">
              <div class="col-md-6">
                <div class="form-group"><input type="text" class="form-control" placeholder="First Name *" name="fullname"/></div>
                <div class="form-group"><input type="text" class="form-control" placeholder="Last Name *" name="lastname"/></div>
                <div class="form-group"><input type="email" class="form-control" placeholder="Email" name="email" /></div>
                <div class="form-group"><input type="text" class="form-control" placeholder="Phone *" name="phone" /></div>
                <div class="form-group"><input type="text" class="form-control" placeholder="Business / Occupation" name="occupation"/></div>
              </div>
              <div class="col-md-6">
                <div class="form-group"><input type="text" class="form-control" placeholder="Village / City *" name="village" /></div>
                <div class="form-group"><input type="text" class="form-control" placeholder="Mandal *" name="mandal" /></div>
                <div class="form-group"><input type="text" class="form-control" placeholder="District *" name="district"/></div>
                <div class="form-group"><input type="text" class="form-control" placeholder="State *" name="state"/></div>
                <div class="form-group"><input type="text" class="form-control" placeholder="Police Station" name="police_station"/></div>
              </div>
              <div class="col-md-12">
                <div class="form-group"><textarea class="form-control" placeholder="Address" rows="1" name="address"></textarea></div>
                <div class="form-group"><textarea class="form-control" name="charity_event" placeholder="How can you help charities" ></textarea></div>
              </div>
              <div class="col-md-12" align="right">
                <input type="submit" class="btnRegister"  value="Register"/>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php 
// footer
include_once "footer.php";
?>