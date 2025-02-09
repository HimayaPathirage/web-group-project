<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $id = $_POST['id'];


        $con = new mysqli('localhost','root','root','fresh_mart');

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
            //echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $con->connect_error]);
            exit();
        }

        $sql = "update user set fname='$fname', lname='$lname' , email='$email', password='$password' where id=$id";
        if ($con->query($sql) === TRUE) {
            // Respond with 'success' and the user's ID
            echo json_encode(['status' => 'success', 'id' => $id]);
        } else {
            echo "Error updating record: " . $con->error;
        }
        $con->close();
    } else {
        echo "Invalid request.";
        
    }
?>