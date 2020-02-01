<?php 
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
    if (!$_GET['id']) {
        include 'includes/errorMessage.php';
        header("Location: viewRecords.php");

    } else {
        // Get ID values
        $id = $_GET['id'];

        // Call Delete function
        $result = $crud->deleteAttendee($id);

        // redirecting tq list
        if ($result) {
            header("Location: viewRecords.php");
        } else {
            include 'includes/errorMessage.php';
        }
    }
    
?>