<?php
    $id = $_GET['id'];

    $con = new mysqli('localhost','root','root','fresh_mart');
    $sql = "delete from fruits where id = $id";
    $success = $con->query($sql);

    if($success)
    {
        header('location:fruit-table.php');
    }
    else{
        echo "Not Successfull";
    }
    // $con->close();
?>