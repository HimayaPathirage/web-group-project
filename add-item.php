<?php
    if (isset($_POST['vegetable'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $imgUrl = '';

        // Check if a file is uploaded
        if (isset($_FILES['imgUrl']) && $_FILES['imgUrl']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = 'images/veg/';
            // Create the uploads directory if it doesn't exist
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $uploadFile = $uploadDir . basename($_FILES['imgUrl']['name']);
            if (move_uploaded_file($_FILES['imgUrl']['tmp_name'], $uploadFile)) {
                $imgUrl = $uploadFile;
            } else {
                echo "File upload failed.";
                exit;
            }
        }
        $con = new mysqli('localhost','root','root','fresh_mart');

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        
        $sql = "insert into vegetables values (null,'$imgUrl','$name','$price')";
        $success = $con->query($sql);
        $id = $con->insert_id;
        $con->close();
        if($success) 
        {   
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Item Added Successfully',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                    customClass: {
                        popup: 'swal2-popup',
                        confirmButton: 'swal2-confirm'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'vegetable-table.php';
                    }
                });
            });
            </script>";
            /*header("location:vegetable-table.php");*/
        }
        else {
            echo "Something is wrong";
        }
    }
    elseif (isset($_POST['fruit'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $imgUrl = '';

        // Check if a file is uploaded
        if (isset($_FILES['imgUrl']) && $_FILES['imgUrl']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = 'images/fruits/';
            // Create the uploads directory if it doesn't exist
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $uploadFile = $uploadDir . basename($_FILES['imgUrl']['name']);
            if (move_uploaded_file($_FILES['imgUrl']['tmp_name'], $uploadFile)) {
                $imgUrl = $uploadFile;
            } else {
                echo "File upload failed.";
                exit;
            }
        }

        $con = new mysqli('localhost','root','root','fresh_mart');

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        $sql = "insert into fruits values (null,'$imgUrl','$name','$price')";
        $success = $con->query($sql);
        $id = $con->insert_id;
        $con->close();
        if($success) 
        {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Item Added Successfully',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                    customClass: {
                        popup: 'swal2-popup',
                        confirmButton: 'swal2-confirm'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'fruit-table.php';
                    }
                });
            });
            </script>";
            
        }
        else {
            echo "Something is wrong";
        }
    }
    elseif(isset($_POST['meat'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $imgUrl = '';

        // Check if a file is uploaded
        if (isset($_FILES['imgUrl']) && $_FILES['imgUrl']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = 'images/meats/';
            // Create the uploads directory if it doesn't exist
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $uploadFile = $uploadDir . basename($_FILES['imgUrl']['name']);
            if (move_uploaded_file($_FILES['imgUrl']['tmp_name'], $uploadFile)) {
                $imgUrl = $uploadFile;
            } else {
                echo "File upload failed.";
                exit;
            }
        }

        $con = new mysqli('localhost','root','root','fresh_mart');

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        $sql = "insert into meats values (null,'$imgUrl','$name','$price')";
        $success = $con->query($sql);
        $id = $con->insert_id;
        $con->close();
        if($success) 
        {   
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Item Added Successfully',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                    customClass: {
                        popup: 'swal2-popup',
                        confirmButton: 'swal2-confirm'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'meat-table.php';
                    }
                });
            });
            </script>";
             
        }
        else {
            echo "Something is wrong";
        }  
    }else{
        echo "Something is wrong";
    }
?>