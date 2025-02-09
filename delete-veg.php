<?php
    $id = $_GET['id'];

    $con = new mysqli('localhost','root','root','fresh_mart');
    $sql = "delete from vegetables where id = $id";
    $success = $con->query($sql);

    if($success)
    {
        header('location:vegetable-table.php');
    }
    else{
        echo "Not Successfull";
    }
    // $con->close();
?>