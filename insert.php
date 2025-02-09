<?php
    if(isset($_POST['submit'])){

        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $usertype = $_POST['usertype'];
        

        $con = new mysqli('localhost','root','root','fresh_mart');
        
        $userExist = "select * from user where password='$password'&& email='$email'";
        $result = $con->query($userExist);
        if($result->num_rows > 0) exit("Profile is already exists");

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        
        $sql = "insert into user values (null,'$fname','$lname','$email','$password','$usertype')";
        $success = $con->query($sql);
        $id = $con->insert_id;
        
        
        $con->close();

        if($success){
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<style>
            .swal2-popup {
                background-color: #333 !important;
                color : white !important;
            }
            .swal2-confirm {
                background-color: #1a6d10  !important;
                color: white !important;
                border-bottom-left-radius:30px !important; 
                border-top-right-radius: 30px !important;
            }
        </style>";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Profile Created Successfully',
                    icon: 'success',
                    confirmButtonText: 'Login',
                    customClass: {
                        popup: 'swal2-popup',
                        confirmButton: 'swal2-confirm'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'login.html';
                    }
                });
            });
        </script>";
        }
        else{
            echo "Something Wrong " ;
        }
    }
   
    
?>
