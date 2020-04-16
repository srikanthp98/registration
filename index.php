<?php

// include database and object files
include_once 'config/database.php';
include_once 'objects/farmer.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$farmer = new Farmer($db);

// set page headers
include_once "header.php";

?>

<?php
// if the form was submitted
if($_POST){
 
  // set product property values
  $farmer->firstname = $_POST['firstname'];
  $farmer->lastname = $_POST['lastname'];
  $farmer->father = $_POST['father'];
  $farmer->email = ($_POST['email'])??null;
  $farmer->mobile = ($_POST['mobile'])??null;
  $farmer->village = $_POST['village'];
  $farmer->mandal = $_POST['mandal'];
  $farmer->district = "Guntur";
  $farmer->state = "Andhrapradesh";
  $farmer->pincode = $_POST['pincode']
  $farmer->crop1 = ($_POST['crop1'])??null;
  $farmer->crop2 = ($_POST['crop2'])??null;
  $farmer->crop3 = ($_POST['crop3'])??null;
 
  // create the product
  if($farmer->create()){
    echo "<div class='alert alert-success'>Farmer details saved!</div>";
  } 
  // if unable to create the product, tell the user
  else{
    echo "<div class='alert alert-danger'>Error! Please Contact Chanti!.</div>";
  }
  exit();
}
?>

<!-- Register --> 
<div class="register">
  <div id="response"></div>
  <div class="row">
    <div class="col-md-3 register-left">
      <img src="../images/logo.jpeg" alt="Indolife"/>
      <h3>Namaskaram</h3>
      <p>Farmers Information</p>
    </div>
    <div class="col-md-9 register-right">
      <form name="register" id="register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="profile-tab">
            <h3  class="register-heading">Farmer details</h3>
            <div class="row register-form">
              <div class="col-md-6">
                <div class="form-group"><input type="text" class="form-control" placeholder="First Name *" name="firstname"/></div>
                <div class="form-group"><input type="text" class="form-control" placeholder="Last Name *" name="lastname"/></div>
                <div class="form-group"><input type="email" class="form-control" placeholder="Father" name="father" /></div>
                <div class="form-group"><input type="email" class="form-control" placeholder="Email" name="email" /></div>
                <div class="form-group"><input type="text" class="form-control" placeholder="Mobile *" name="mobile" /></div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                	<input type="text" class="form-control" placeholder="Village / City *" name="village" />
                	<select class="form-control" name="village">
                		<option value="Rentachintala">Rentachintala</option>
                		<option value="Paluvoi">Paluvoi</option>
                		<option value="Paluvoi Gate">Paluvoi Gate</option>
                		<option value="Tummrukota">Tummrukota</option>
                		<option value="Goli">Goli</option>
                		<option value="2">Pasarlapadu</option>
                		<option value="2">Pasarlapadu</option>
                		<option value="2">Pasarlapadu</option>
                		<option value="2">Pasarlapadu</option>
                	</select>
                </div>
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