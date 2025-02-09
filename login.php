<?php
    if(isset($_GET['submit'])){
        $email = $_GET['email'];
        $password = $_GET['password'];

        $con = new mysqli('localhost','root','root','fresh_mart');
        $sql = "select * from user where password='$password'&& email='$email'";
        $result = $con->query($sql);
        $row = $result->fetch_Object();
       
        if($result->num_rows == 0){
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'User Not Found',
                        text: 'Invalid email or password',
                        icon: 'warning',
                        confirmButtonText: 'Try Again'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'login.html';
                        }
                    });
                });
            </script>";
        }
        elseif($result->num_rows == 1){
            if($row->user_type=='admin'){
                $id = $row->id;
                header("Location: admin-profile.php?id=$id");
            }
            elseif($row->user_type=='customer'){
                $id = $row->id;
                header("Location: customer-profile.php?id=$id");
            }
            else{
                echo "Something is wrong";
            }
        }
        else{
            echo "Something is wrong";
        }
    }

?>