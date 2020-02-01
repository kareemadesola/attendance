

<?php 
$title = "Edit Record";
require_once 'includes/header.php';
require_once 'auth_check.php';
require_once 'db/conn.php';
$results = $crud->getSpecialties();

if(!isset($_GET['id'])){
  // echo 'error';
  include 'includes/errorMessage.php';
  // header("Location: viewRecords.php");
} else{
$id = $_GET['id'];
$attendee = $crud->getAttendeeDetails($id);
// require_once 'db/test.php';
?>

    <h1 class="text-center">Edit Record</h1>
<form method="POST" action=editPost.php>
  <input type="hidden" name="id" value= '<?php echo $attendee['attendee_id'] ?>'>
  <div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control" value='<?php echo $attendee['firstName']; ?>' id="firstname" name="firstname">
  </div>

  <div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control" value='<?php echo $attendee['lastName']; ?>' id="lastname" name="lastname">
  </div>
  
  <div class="form-group">
    <label for="dob">Date of Birth </label>
    <input type="text" class="form-control" value='<?php echo $attendee['dateOfBirth']; ?>' id="dob" name="dob">
  </div>

  <div class="form-group">
    <label for="specialty">Area of Expertise</label>
    <select class="form-control" id="specialty" name="specialty">
      <?php while($r=$results->fetch(PDO::FETCH_ASSOC)) { ?>
        <option value="<?php echo $r['specialty_ID']?>" <?php if ($r['specialty_ID'] == $attendee['specialty_ID']) echo 'selected'?>>
          <?php echo $r['name']; ?>
        </option>

      <?php } ?>
    </select>
  </div>
  
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" value='<?php echo $attendee['emailAddress']; ?>' id="email" aria-describedby="emailHelp" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="phone">Contact Number</label>
    <input type="tel" class="form-control" value='<?php echo $attendee['contact']; ?>' id="phone" aria-describedby="phoneHelp" name="phone">
    <small id="phoneHelp" class="form-text text-muted">We'll never share your contacts with anyone else.</small>
  </div>
  <a href="viewRecords.php" class='btn btn-default'>Back to List</a>
  <button type="submit" name="submit" class="btn btn-success  ">Save Changes</button>
</form>

<?php } ?>
<br>
<br>
<br>
<br>

<?php 
require_once 'includes/footer.php';
?>
