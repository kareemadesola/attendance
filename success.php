<?php 
$title = "Success";
require_once 'includes/header.php';
require_once 'db/conn.php';

if(isset($_POST['submit'])){
  // extract values from the $_POST array
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $contact = $_POST['phone'];
  $specialty = $_POST['specialty'];

  // call function to insert and track if success or not
  $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty);

  if($isSuccess){
    include 'includes/successMessage.php';

  } else{
    include 'includes/errorMessage.php';

  }
}
?>


<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h6 class="card-title"> <?php echo $_POST["firstname"]. ' '.$_POST['lastname']?></h6>
    <p class="card-title">Specialty: <?php echo $_POST['specialty']?></p>
    <p class="card-title">Date of Birth <?php echo $_POST["dob"]  ?></p>
    <p class="card-title">Email Address <?php echo $_POST["email"]?></p>
    <p class="card-title">Contact Number <?php echo $_POST["phone"]?></p>
  </div>
</div>
<br>
<br>
<br>
<br>

<?php 
require_once 'includes/footer.php';
?>