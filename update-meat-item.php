<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $imgUrl = $_POST['imgUrl'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $id = $_POST['id'];

        $con = new mysqli('localhost','root','root','fresh_mart');

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        $sql = "update meats set img_url='$imgUrl', name='$name' , price='$price' where id=$id";
        if ($con->query($sql) === TRUE) {
            echo 'success'; // Indicate success to the AJAX request
        } else {
            echo "Error updating record: " . $con->error;
        }
        $con->close();
    } else {
        echo "Invalid request.";
    }
?>