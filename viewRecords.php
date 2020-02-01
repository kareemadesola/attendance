<?php 
$title = "View Records";

require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

    //  get all attendees
    $results = $crud->getAttendees();
?>

    <table class='table'>
        <thead>

            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <!-- <th>Date of Birth</th> -->
            <!-- <th>Email Address</th> -->
            <!-- <th>Contact Number</th> -->
            <th>Specialty</th>
            <th>Actions</th>

        </thead>
        

           <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
            <tr>
                <td> <?php echo $r['attendee_id'] ?></td>
                <td><?php echo $r['firstName'] ?></td>  
                <td><?php echo $r['lastName'] ?></td>  
                <!-- <td><?php // echo $r['dateOfBirth'] ?></td>   -->
                <!-- <td><?php //echo $r['emailAddress'] ?></td>   -->
                <!-- <td><?php //echo $r['contact'] ?></td>   -->
                <td><?php echo $r['name'] ?></td>  
                <td>
                    <a href="view.php?id=<?php echo $r['attendee_id'] ?>" class='btn btn-primary'>View</a>
                    <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class='btn btn-warning'>Edit</a>
                    <a onclick = "return confirm('Are you sure you want to delete this record?')" href="delete.php?id=<?php echo $r['attendee_id'] ?>" class='btn btn-danger'>Delete </a>
                    
                </td>

            </tr>
           <?php } ?>
    
    </table>

<br>
<br>
<br>
<br>
<?php 
require_once 'includes/footer.php';
?>