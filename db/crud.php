<?php 
    class Crud {
        // private database object
        private $db;

        // constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }
        // function to insert a new record into the attendee database
        public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty){
            try {
                // define sql statement to be executed
                $sql =  "INSERT INTO attendee (firstName, lastName,dateOfBirth, emailAddress, contact, specialtyID) VALUES (:fname, :lname, :dob, :email, :contact, :specialty)";
                
                // prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);

                // bind all placeholders to the actual values
                $stmt->bindparam(':lname',  $lname); 
                $stmt->bindparam(':fname',  $fname);
                $stmt->bindparam(':dob',  $dob);
                $stmt->bindparam(':email',  $email);
                $stmt->bindparam(':contact',  $contact);
                $stmt->bindparam(':specialty',  $specialty);
                
                // execute statement 
                $stmt->execute();
                return true; 
            } catch ( PDOException $e) {
                echo $e->getMessage();
                return false;
            }   
        }
    
    public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty)
    {
        try {
            $sql = "UPDATE `attendee` SET `firstName`=:fname,`lastName`=:lname,`dateOfBirth`=:dob,`emailAddress`=:email,`contact`=:contact,`specialtyID`=:specialty WHERE `attendee_id`=:id";
        // prepare the sql statement for execution
        $stmt = $this->db->prepare($sql);

        // bind all placeholders to the actual values
        $stmt->bindparam(':lname',  $lname); 
        $stmt->bindparam(':fname',  $fname);
        $stmt->bindparam(':dob',  $dob);
        $stmt->bindparam(':email',  $email);
        $stmt->bindparam(':contact',  $contact);
        $stmt->bindparam(':specialty',  $specialty);
        $stmt->bindparam(':id',  $id);

        
        // execute statement 
        $stmt->execute();
        return true; 
        } catch (PDOException $e ) {
            echo $e->getMessage();
            return false;
        }
        
    }

    public function getAttendees(){
        try {
            $sql = "SELECT * FROM `attendee` as a inner join specialties as s on a.specialtyID = s.specialty_ID";
            $result = $this->db->query($sql);
            return $result;
    
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        
    }

    public function getAttendeeDetails($id)
    {
        try{
            $sql = "SELECT * from attendee as a inner join specialties as s on a.specialtyID = s.specialty_ID where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();     
            $result = $stmt->fetch();
            return $result;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        
    }
    
    public function deleteAttendee($id){
        try {
        $sql = "DELETE FROM `attendee` WHERE attendee_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        return true;
    }catch (PDOException $e ) {
        echo $e->getMessage();
        return false;
    }
        
    }
    public function getSpecialties(){
        try {
            $sql = "SELECT * FROM `specialties`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }           
       
       }

    }

?>  