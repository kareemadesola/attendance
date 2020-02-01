<?php 
$title = "View Record";

require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

    //  get one attendee
    if(!isset($_GET['id'])){
      include 'includes/errorMessage.php';

    } else{         
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
    

?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h6 class="card-title"> <?php echo $result["firstName"]. ' '.$result['lastName']?></h6>
    <p class="card-title">Specialty: <?php echo $result['name']?></p>
    <p class="card-title">Date of Birth <?php echo $result["dateOfBirth"]  ?></p>
    <p class="card-title">Email Address <?php echo $result["emailAddress"]?></p>
    <p class="card-title">Contact Number <?php echo $result["contact"]?></p>
  </div>
</div>
<br>
<a href="viewRecords.php" class='btn btn-info'>Back to List</a>
<a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class='btn btn-warning'>Edit</a>
<a onclick = "return confirm('Are you sure you want to delete this record?')" href="delete.php?id=<?php echo $result['attendee_id'] ?>" class='btn btn-danger'>Delete </a>
<?php  } ?>
<br>
<br>
<br>
<br> 
<?php 
require_once 'includes/footer.php';
?>